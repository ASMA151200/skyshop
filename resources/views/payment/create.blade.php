<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
</head>
<body>
    <h1>Passer une commande</h1>
    <form action="{{ route('payment.initiate') }}" method="POST">
        @csrf
        <label for="name">Nom complet :</label>
        <input type="number" name="amount" id="name" required min="1">
        <br>

        <label for="phone">Numéro de téléphone :</label>
        <input type="tel" name="phone" id="phone" required pattern="^[0-9]{9,15}$">
        <br>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <br>

        <button type="submit">Payer</button>
    </form>
</body>
</html>
