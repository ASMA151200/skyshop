@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Récapitulatif de la commande</h2>

    <!-- Affichage des détails de la commande -->
    <div class="mb-3">
        <strong>Nom complet :</strong> {{ $name }} XOF
    </div>
    <div class="mb-3">
        <strong>Numéro de téléphone :</strong> {{ $phone }}
    </div>
    <div class="mb-3">
        <strong>Email :</strong> {{ $email }}
    </div>

    <div class="mb-3">
        <!-- Bouton pour procéder au paiement -->
        <form action="{{ route('payment.initiate') }}" method="POST">
            @csrf
            <input type="hidden" name="name" value="{{ $name }}">
            <input type="hidden" name="phone" value="{{ $phone }}">
            <input type="hidden" name="email" value="{{ $email }}">
            
            <button type="submit" class="btn btn-success">Confirmer et procéder au paiement</button>
        </form>
    </div>

    <div class="mb-3">
        <!-- Lien pour annuler et revenir -->
        <a href="{{ route('home') }}" class="btn btn-danger">Annuler</a>
    </div>
</div>
@endsection
