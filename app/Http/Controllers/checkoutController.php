<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Affiche la page de checkout.
     */
    public function index()
    {
        // Vous pouvez ajouter des données nécessaires à passer à la vue
        return view('checkout'); // Assurez-vous que 'checkout.blade.php' existe dans 'resources/views'
    }
}
