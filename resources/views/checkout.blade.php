@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Passer à la caisse</h2>

    <p>Merci de vérifier vos informations avant de valider votre commande.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Exemple de formulaire de paiement -->
    <form action="{{ route('payment.initiate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom complet :</label>
            <input type="text" class="form-control" id="name" name="name" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Adresse email :</label>
            <input type="email" class="form-control" id="email" name="email" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Numéro de téléphone :</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-right mt-3">
            <button type="submit" class="btn btn-success">Valider et payer</button>
        </div>
    </form>
</div>
@endsection
