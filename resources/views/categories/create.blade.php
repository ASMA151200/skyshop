@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endsection

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter un nouveau categorie</h2>
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



    <form action="{{route('categories.store')}}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        <div class="form-group mb-3">
            <label for="nom_categorie">Nom du Categorie</label>
            <input type="text" name="nom_categorie" value="{{old('nom_categorie')}}" required class="form-control" />
        </div>
        
        <div class="form-group mb-3">
            <label for="desc_categorie">La description du categorie</label>
            <textarea name="desc_categorie" id="desc_categorie">{{ old('desc_categorie') }}</textarea>
            
        </div>
        
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </form>
</div>

@endsection