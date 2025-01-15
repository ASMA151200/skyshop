<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif du paiement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Récapitulatif du paiement</h1>
        <div class="mt-4">
            <p><strong>name:</strong> {{ $name }}</p>
            <p><strong>Numéro de téléphone :</strong> {{ $phone }}</p>
            <p><strong>Email :</strong> {{ $email }}</p>
        </div>
        <form action="{{ route('payment.confirm') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="amount" value="{{ $amount }}">
            <input type="hidden" name="phone" value="{{ $phone }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <button type="submit" class="btn btn-success w-100">Confirmer le paiement</button>
        </form>
    </div>
</body>
</html>
