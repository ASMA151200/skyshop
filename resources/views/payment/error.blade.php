<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erreur de Paiement</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 text-center">
        <h1 class="text-danger">Erreur de Paiement</h1>
        <p>Une erreur s'est produite lors de votre paiement. Veuillez réessayer.</p>
        <a href="{{ route('payment.create') }}" class="btn btn-warning">Réessayer</a>
    </div>
</body>
</html>
