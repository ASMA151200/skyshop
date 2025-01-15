@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Votre Panier</h2>

    <!-- Notifications -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(count($panier) > 0)
        <!-- Table des articles -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom de l'Article</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($panier as $id => $article)
                    <tr>
                        <td>{{ $article['nom_article'] }}</td>
                        <td>{{ $article['quantite'] }}</td>
                        <td>{{ number_format($article['prix'], 2) }} FCFA</td>
                        <td>{{ number_format($article['prix'] * $article['quantite'], 2) }} FCFA</td>
                        <td>
                            <!-- Supprimer un article -->
                            <form action="{{ route('panier.supprimer', $id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total -->
        <div class="text-right mb-3">
            <h4><strong>Total : </strong>{{ number_format($total ?? 0, 2) }} FCFA</h4>
        </div>

        <!-- Boutons d'action -->
        <div class="d-flex justify-content-between">
            <!-- Continuer les achats -->
            <a href="{{ route('articles.index') }}" class="btn btn-primary">Continuer vos achats</a>

            <!-- Vider le panier -->
            <form action="{{ route('panier.vider') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-warning">Vider le panier</button>
            </form>

            <!-- Procéder au paiement -->
            <a href="{{ route('checkout') }}" class="btn btn-success">Passer à la caisse</a>
        </div>
    @else
        <!-- Message si le panier est vide -->
        <p class="text-center">Votre panier est vide. <a href="{{ route('articles.index') }}">Ajoutez des articles</a>.</p>
    @endif
</div>
@endsection
