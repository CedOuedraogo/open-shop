<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;

class MainController extends Controller
{
    public function accueil()
    {
        $user = User::orderByDesc('id')->first();
        //dd($user->isAdmin()); //pour    ficher vwr si un user est admin
        $produits = Produit::orderByDesc('id')->take(9)->get();

        return view('welcome', ['produits' => $produits]);
    }
}
