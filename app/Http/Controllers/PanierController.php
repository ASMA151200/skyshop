<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    /**
     * Ajouter un article au panier.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ajouter($id)
    {
        // Trouver l'article par son ID
        $article = Article::findOrFail($id);

        // Vérifier la disponibilité en stock
        if ($article->quantite_stock <= 0) {
            return redirect()->route('panier.afficher')->with('error', 'Article en rupture de stock!');
        }

        // Récupérer ou initialiser le panier
        $panier = session()->get('panier', []);

        // Vérifier si l'article existe déjà dans le panier
        if (isset($panier[$id])) {
            if ($panier[$id]['quantite'] < $article->quantite_stock) {
                $panier[$id]['quantite']++;
            } else {
                return redirect()->route('panier.afficher')->with('error', 'Quantité maximale atteinte pour cet article!');
            }
        } else {
            $panier[$id] = [
                'nom_article' => $article->nom_article,
                'prix' => $article->prix,
                'quantite' => 1,
                'image' => $article->image,
                'categorie_id' => $article->categorie_id,
            ];
        }

        // Enregistrer le panier dans la session
        session()->put('panier', $panier);

        return redirect()->route('panier.afficher')->with('success', 'Article ajouté au panier!');
    }

    /**
     * Afficher les articles dans le panier.
     *
     * @return \Illuminate\View\View
     */
    public function afficher()
    {
        $panier = session()->get('panier', []);
        $total = 0;

        foreach ($panier as $article) {
            $total += $article['prix'] * $article['quantite'];
        }

        return view('panier.afficher', compact('panier', 'total'));
    }

    /**
     * Supprimer un article du panier.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function supprimer($id)
    {
        $panier = session()->get('panier', []);

        if (isset($panier[$id])) {
            unset($panier[$id]);
            session()->put('panier', $panier);
        }

        return redirect()->route('panier.afficher')->with('success', 'Article supprimé du panier!');
    }

    /**
     * Vider le panier.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function vider()
    {
        session()->forget('panier');

        return redirect()->route('panier.afficher')->with('success', 'Panier vidé avec succès!');
    }
}
