@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"><!-- Ajout des icônes font aweson -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> <!-- Ajout des icônes Bootstrap -->
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="card-header text-white bg-primary">
                <h1 class="text-center">Détails de l'Article</h1>
            </div>
            <div class="card-body">
                <p class="text-secondary">Vous consultez actuellement l'article numéro <strong class="text-primary">{{$article->id}}</strong>, qui fait partie de notre catalogue soigneusement enregistré et maintenu.</p>
                
                <div class="mb-4">
                    <h5><i class="bi bi-box-seam me-2"></i> Nom de l'article :</h5>
                    <p class="fw-bold">{{$article->nom_article}}</p>
                    <p class="text-muted">Le nom de cet article, <em>{{$article->nom_article}}</em>, reflète son caractère unique et son identité dans notre inventaire.</p>
                </div>
                
                <div class="mb-4">
                    <h5><i class="bi bi-archive me-2"></i> Quantité en stock :</h5>
                    <p class="fw-bold">{{$article->quantite_stock}}</p>
                    <p class="text-muted">Quantité disponible en stock : <em>{{$article->quantite_stock}}</em> unités, mise à jour régulièrement pour garantir la précision.</p>
                </div>
                
                <div class="mb-4">
                    <h5><i class="bi bi-currency-euro me-2"></i> Prix de l'article :</h5>
                    <p class="fw-bold">{{$article->prix}} cfa</p>
                    <p class="text-muted">Ce prix est déterminé pour offrir un excellent rapport qualité-prix.</p>
                </div>

                <div class="mb-4">
                    <h5><i class="bi bi-archive me-2"></i> Catégorie :</h5>
                    <p class="fw-bold">{{$article->categorie->nom_categorie}} </p>
                    <p class="text-muted">{{$article->categorie->desc_categorie}}</p>
                </div>
                
               <div style>
               <img src="{{asset('images/thankyou.png')}}" class="rounded-circle" alt="...">
               </div>
            </div>
        </div>
    </div>

    
@endsection