function addToCart(productId, quantity = 1) {
    // Make AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/index.php/cart/add/' + productId, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Log the response, handle it as needed
                alert('Produit ajouté au panier!');
            } else {
                console.error('Error:', xhr.statusText);
                alert('Erreur lors de l\'ajout du produit au panier');
            }
        }
    };

    // You can adjust the quantity and other parameters as needed
    var data = 'product_id=' + encodeURIComponent(productId) + '&quantity=' + encodeURIComponent(quantity);

    xhr.send(data);
}

function deleteFromCart(productId) {
    // Make AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/index.php/cart/delete/' + productId, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Log the response, handle it as needed
                alert('Produit supprimé du panier!');
            } else {
                console.error('Error:', xhr.statusText);
                alert('Erreur lors de la suppression du produit du panier');
            }
        }
    };

    // No data is sent in this case, as the product ID is in the URL

    xhr.send();
}

function viewCart() {
    // Make AJAX request to get the cart contents
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/index.php/cart/get', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Parse the JSON response
                var cartContents = JSON.parse(xhr.responseText);
                console.log(cartContents);

                // Display the cart contents in a Bootstrap modal
                displayCartModal(cartContents);
            } else {
                console.error('Error:', xhr.statusText);
                alert('Error getting cart contents');
            }
        }
    };

    xhr.send();
}

function displayCartModal(cartContents) {
    let xsrf = document.querySelector('meta[name="csrf-token"]').content
    console.log("Displaying modal");
    // Create a Bootstrap modal
    console.log(cartContents);

    var buyString = ""

    if (cartContents[0] != null){
        buyString= `<form action="/index.php/confirmationAchat" method="post" id="ConfirmationAchat" enctype="multipart/form-data">
        <div class="d-flex">
            <input type="hidden" name="_token" value="${xsrf}">
            <input type="hidden" name="nomProduit" value="${cartContents[0].nom}">
            <input type="hidden" name="prixProduit" value="${cartContents[0].id}">
            <button type="submit" class="btn btn-primary">Acheter</button>
        </div>
    </form>`
    }
    var modalHtml = `
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">Contenu du panier</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body mb-2">
                        <ul class="list-group">
                            ${Object.keys(cartContents).map(productId => `
                                <li class="list-group-item">
                                    ${cartContents[productId].nom}, Quantité: ${cartContents[productId].quantite}, Prix: $${cartContents[productId].prix}
                                    <button onclick="updateQuantity(${cartContents[productId].id})" class="btn btn-sm btn-primary">Modifier quantité</button>
                                    <button onclick="deleteItem(${cartContents[productId].id})" class="btn btn-sm btn-danger">Supprimer</button>
                                </li>
                            `).join('')}
                        </ul>
                        ${buyString}
                    </div>
                </div>
            </div>
        </div>
    `;

    // Remove existing modal if it exists
    var existingModal = document.getElementById('cartModal');
    if (existingModal) {
        // Dispose the existing modal before removing it
        var modal = bootstrap.Modal.getInstance(existingModal);
        if (modal) {
            modal.dispose();
        }
        existingModal.remove();
    }

    // Append the modal HTML to the document body
    document.body.insertAdjacentHTML('beforeend', modalHtml);

    // Show the modal
    var cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
    cartModal.show();
}


function updateQuantity(productId) {
    var newQuantity = prompt('Nouvelle quantité:');
    if (newQuantity !== null && !isNaN(newQuantity)) {
        // Make AJAX request to update quantity
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/index.php/cart/update/' + productId, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText); // Log the response, handle it as needed
                    //alert('Quantity updated successfully!');
                    //cartModal.hide();
                    // Refresh the modal or update the quantity display
                    viewCart();
                } else {
                    console.error('Error:', xhr.statusText);
                    alert('Error updating quantity');
                }
            }
        };

        var data = 'quantity=' + encodeURIComponent(newQuantity);
        xhr.send(data);
    }
}

function deleteItem(productId) {
    var confirmDelete = confirm('Etes-vous sûr de supprimer l\'article?');
    if (confirmDelete) {
        // Make AJAX request to delete item
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/index.php/cart/delete/' + productId, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText); // Log the response, handle it as needed
                    //alert('Item deleted successfully!');
                    //cartModal.hide();
                    // Refresh the modal or update the item list
                    viewCart();
                } else {
                    console.error('Error:', xhr.statusText);
                    alert('Error deleting item');
                }
            }
        };

        xhr.send();
    }
}