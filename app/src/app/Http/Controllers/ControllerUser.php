<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Auth\Events\PasswordReset;

class ControllerUser extends Controller
{
	// Affiche la page mon compte
    public function showMonCompte() {
		$user = Auth::user();
		
		return view('monCompte')->with('user', $user);
	}
	
	// Affiche le formulaire de changement de mot de passe
	public function showChangePassword() {
		return view('auth.passwords.change');
	}
	
	// Tente de modifier le mot de passe de l'utilisateur
	public function changePassword(Request $request) {
		$validator = Validator::make($request->all(), [
			'old_password' => ['required', PasswordRule::min(8)],
			'new_password' => ['required', 'confirmed', PasswordRule::min(8)],
		]);
		
		// Validates the form input
		if ($validator->fails()) {
			// Returns to the last page if validation fails
			return redirect()->back()->withErrors($validator)->withInput();
		}
		
		// Gets the validated input
		$validated = $validator->validated();
		$user = Auth::user();
		
		// If old password doesn't correspond with current password, redirect with error message
		if (!Hash::check($validated['old_password'], $user->password))
			return redirect()->back()->withErrors(['old_password' => 'Mot de passe incorrect']);
		
		$user->password = Hash::make($validated['new_password']);
		$user->save();
		
		Auth::guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/login');
	}
}
