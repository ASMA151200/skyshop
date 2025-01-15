@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"><!-- Ajout des icônes font aweson -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> <!-- Ajout des icônes Bootstrap -->
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow-lg border-0">
            <div class="card-header text-white bg-primary">
                <h1 class="text-center">Détails du Categorie</h1>
            </div>
            <div class="card-body">
                <p class="text-secondary">Vous consultez actuellement le categorie<strong class="text-primary">{{$categorie->id}}</strong>, qui fait partie de notre catalogue soigneusement enregistré et maintenu.</p>
                
                <div class="mb-4">
                    <h5><i class="bi bi-box-seam me-2"></i> Nom du Categorie :</h5>
                    <p class="fw-bold">{{$categorie->nom_categorie}}</p>
                    <p class="text-muted">Le nom de cet categorie, <em>{{$categorie->nom_categorie}}</em>, reflète son caractère unique et son identité dans notre inventaire.</p>
                </div>
                <div class="mb-4">
                    <h5><i class="bi bi-box-seam me-2"></i> Desription du Categorie :</h5>
                    <p class="fw-bold">{{$categorie->desc_categorie}}</p>
                    <p class="text-muted">{{$categorie->desc_categorie}}</p>
                </div>
                

               <div style>
               <img src="{{asset('images/thankyou.png')}}" class="rounded-circle" alt="...">
               </div>
            </div>
        </div>
    </div>

    
@endsection