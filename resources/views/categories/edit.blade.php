@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Modifier le categorie</h2>



    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger"> {{ $error }}</li>
        @endforeach
    </ul>


    <form action="{{ route('categories.update',$categorie->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="nom_categorie">Nom du categorie</label>
            <input type="text" name="nom_categorie" value="{{ $categorie->nom_categorie}}" required class="form-control" />
        </div>
        
        <div class="form-group mb-3">
            <label for="desc_categorie">La description du categorie</label>
            <textarea name="desc_categorie" id="desc_categorie">{{ old('desc_categorie', $categorie->desc_categorie) }}</textarea>
            
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </form>
</div>
@endsection