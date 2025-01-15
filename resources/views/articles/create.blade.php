@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endsection

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter un nouveau article</h2>
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    @endif


    <!--<ul>
     @foreach ($errors->all() as $error)
        <li class="alert alert-danger"> {{ $error }}</li>
      @endforeach
    </ul>-->



    <form action="{{route('articles.store')}}" method="POST" class="bg-light p-4 rounded shadow-sm" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="nom_article">Nom de l'Article</label>
            <input type="text" name="nom_article" value="{{old('nom_article')}}" required class="form-control" />
        </div>
        <div class="form-group mb-3">
            <label for="image_article">L'image de l'article</label>
            <input type="file" name="image"  required class="form-control" />
        </div>
        
        <div class="form-group mb-3">
            <label for="quantite_stock">La Quantité en Stock</label>
            <input type="text" name="quantite_stock" value="{{old('quantite_stock')}}" required class="form-control" />
        </div>
        <div class="form-group mb-3">
            <label for="prix">Le Prix de l'Article</label>
            <input type="number" name="prix" value="{{old('prix')}}" required class="form-control" />
        </div>
        <div class="form-group mb-3">

        <label for="categorie_id">Catégorie :</label>
    <select name="categorie_id" id="categorie_id" required>
        @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}">{{ $categorie->nom_categorie }}</option>
        @endforeach
    </select>

        </div>
        


    
        

        
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </form>
</div>

@endsection