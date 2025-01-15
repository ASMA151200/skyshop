{{-- @extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Liste des articles</h2>

        

        @if(session('success'))
            <div class="alert alert-success" style="color: red; font-weight: bold;" >
                {{ session('success') }}
            </div>
        @endif


        @if(session('error'))
        <div style="color: red; font-weight: bold;">
            {{ session('error') }}
        </div>
        @endif


        <div class="text-right mb-3 d-flex justify-content-between">
            <!-- Bouton de retour à la page d'accueil avec une icône -->
            <a href="{{route('dashboard')}}" class="btn btn-primary">
                <i class="bi bi-arrow-left-circle me-2"></i>Retour à la page d'accueil
            </a>

            <a href="{{ route('categories.index') }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i>Voir les categories</a>
  


            
            <!-- Bouton d'ajout d'un article avec une icône -->
            <a href="{{route('articles.create')}}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Ajouter un article
            </a>
        </div>


        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom de l'Article</th>
                    <th scope="col">La Quantité de Stock</th>
                    <th scope="col">Le Prix</th>
                    <th scope="col">Catégorie</th>                    
                    <th scope="col">Image</th>                    
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
        <!--</div>-->
            @foreach ($articles as $article)
                
                <tr>
                    <td>{{ $article->nom_article }}</td>
                    <td>{{ $article->quantite_stock }}</td>
                    <td>{{ $article->prix }}</td>
                    <td>{{ $article->categorie->nom_categorie ?? 'Sans catégorie' }}</td> <!-- Vérifie si une catégorie existe -->
                    <td>
                    @if($article->image)
    <img src="{{ asset('storage/' . $article->image) }}" alt="Image de l'article" class="img-fluid" style="max-width: 100px;">
@endif

                    </td>            

                    <td>
                        <a href="{{ route('articles.edit',$article->id) }}" class="btn btn-warning btn-sm" style="color:white"><i class="fa-solid fa-pen-to-square"></i>Modifier</a>
                        <form action="{{ route('articles.destroy',$article->id) }}" method="POST" style="display:inline; margin-right: 3rem; margin-left: 3rem" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette article ?')"><i class="fa-solid fa-trash"></i>Supprimer</button>
                        </form>
                        <a href="{{ route('articles.show',$article->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i>Voir les détails</a>

                    </td>
                    
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
     <!-- Affichage de la pagination -->
     {{ $articles->links() }}

@endsection --}}

@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    .card-columns {
        column-count: 3; /* Nombre de colonnes */
        column-gap: 1rem;
    }
    .article-card {
        margin-bottom: 20px;
        break-inside: avoid; /* Évite la coupure entre les colonnes */
        border: 1px solid #e0e0e0;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }
    .article-card:hover {
        transform: scale(1.03);
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }
    .article-card img {
        max-height: 200px;
        object-fit: cover;
    }
    .article-actions a, .article-actions form button {
        margin-right: 5px;
    }
</style>
@endsection

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Liste des Articles</h2>

    @if(session('success'))
        <div class="alert alert-success" style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <!-- Boutons de navigation -->
        <a href="{{ route('dashboard') }}" class="btn btn-primary">
            <i class="bi bi-arrow-left-circle me-2"></i> Retour à la page d'accueil
        </a>
        <a href="{{ route('categories.index') }}" class="btn btn-info">
            <i class="fa-solid fa-eye"></i> Voir les catégories
        </a>
        <a href="{{ route('articles.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i> Ajouter un article
        </a>
    </div>

    <!-- Section des articles en mode carte -->
    <div class="card-columns">
        @foreach($articles as $article)
        <div class="card article-card">
            @if($article->image)
            <img src="/storage/{{ $article->image }}" class="card-img-top" alt="Image de {{ $article->nom_article }}">
            @else
            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Image non disponible">
            @endif
            <div class="card-body">
                <h5 class="card-title"><strong>Nom: </strong>{{ $article->nom_article }}</h5>
                <p class="card-text"><strong>Description: </strong>{{ $article->quantite_stock}}</p>
                <p class="card-text"><strong>Prix: </strong>{{ $article->prix}}</p>
                {{-- <p class="card-text"><strong>Superfice: </strong>{{ $article->superficie}}</p>
                <p class="card-text"><strong>Localisation: </strong>{{ $article->address}}</p>
                <p><span>Est occupé :</span> 
                    <span class="badge {{ $article->est_occupé ? 'bg-success' : 'bg-secondary' }}">
                        {{ $article->est_occupé ? 'Oui' : 'Non' }}
                    </span>
                </p> --}}
                <!-- <p class="card-text"><strong>Prix : </strong>{{ $article->prix  }} €</p>
                <p class="card-text"><strong>Catégorie : </strong>{{ $article->categorie->nom_categorie ?? 'Non défini' }}</p> -->
            </div>
            <div class="card-footer article-actions d-flex justify-content-between">
                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info btn-sm">
                    <i class="fa-solid fa-eye"></i> 
                </a>
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm" style="color: white;">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                        <i class="fa-solid fa-trash"></i> 
                    </button>
                </form>
                <!-- Bouton d'achat -->
    <a href="{{ route('panier.afficher', $article->id) }}" class="btn btn-success btn-sm">
        <i class="fa-solid fa-shopping-cart"></i> Acheter
    </a>
     <!-- Bouton "Ajouter au panier" -->
     <a href="{{ route('panier.ajouter', $article->id) }}" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-cart-plus"></i> Ajouter au panier
    </a>
                
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection