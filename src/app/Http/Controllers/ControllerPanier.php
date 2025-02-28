<?php
namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Response;
use App\Models\Panier;
use App\Accesseur\ProduitDAO;

class ControllerPanier extends Controller
{
    public function addToCart(Request $request, String $id)
    {
        $productId = $id;
        // Get the quantity from the POST data, default to 1 if not present
        $quantity = $request->input('quantity', 1);

        // Get the current cart data from the session
        $cart = $request->session()->get('cart', []);

        // Check if the product is already in the cart
        if (array_key_exists($productId, $cart)) {
            // Update the quantity if the product is already in the cart
            $cart[$productId] += $quantity;
        } else {
            // Add the product to the cart
            $cart[$productId] = $quantity;
        }
        $cart[$productId] = $quantity;
        // Save the updated cart data back to the session
        $request->session()->put('cart', $cart);
    }

    public function updateCart(Request $request, $productId)
    {
        // Validate the request
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Get the current cart data from the session
        $cart = $this->getCartFromSession($request);

        // Update the quantity for the specified product
        $cart[$productId] = $request->input('quantity');

        // Save the updated cart data back to the session
        $this->saveCartToSession($request, $cart);

        return response()->json(['message' => 'Quantity updated successfully']);
    }

    public function deleteFromCart(Request $request, $productId)
    {
        // Get the current cart data from the session
        $cart = $this->getCartFromSession($request);

        // Check if the product is in the cart
        if (array_key_exists($productId, $cart)) {
            // Remove the product from the cart
            unset($cart[$productId]);

            // Save the updated cart data back to the session
            $this->saveCartToSession($request, $cart);
        }
    }

    public function clearCart(Request $request)
    {
        // Clear the cart by setting an empty array
        $this->saveCartToSession($request, []);
    }

    public function getCartAjax(Request $request)
    {
        $panier = [];

        foreach ($this->getCartFromSession($request) as $id => $qte) {
            $produit = ProduitDAO::getProduit($id);
            $panier[] = [
                'id' => $produit->id,
                'nom' => $produit->nom,
                'prix' => $produit->prix * $qte,
                'quantite' => $qte,
            ];
        }

        // Get the current cart data from the session
        return Response::json($panier);
    }

    private function getCartFromSession(Request $request)
    {
        return $request->session()->get('cart', []);
    }

    private function saveCartToSession(Request $request, array $cart)
    {
        $request->session()->put('cart', $cart);
    }
}

?>