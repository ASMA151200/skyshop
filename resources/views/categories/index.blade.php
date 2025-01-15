@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection

@section('content')
    <div class="container mt-4">
        <h2 class="text-center mb-4">Liste des categories</h2>

        

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

            <!-- Bouton d'ajout d'un categorie avec une icône -->
            <a href="{{route('categories.create')}}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Ajouter un categorie
            </a>
            
        </div>


        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom du catégorie</th>
                    <th scope="col">La description du categorie</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
        <!--</div>-->
            @foreach ($categories as $categorie)
                
                <tr>
                    <td>{{ $categorie->nom_categorie }}</td>
                    <td>{{ $categorie->desc_categorie }}</td>
                    <td>
                        <a href="{{ route('categories.edit',$categorie->id) }}" class="btn btn-warning btn-sm" style="color:white"><i class="fa-solid fa-pen-to-square"></i>Modifier</a>
                        <form action="{{ route('categories.destroy',$categorie->id) }}" method="POST" style="display:inline; margin-right: 3rem; margin-left: 3rem" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette categorie ?')"><i class="fa-solid fa-trash"></i>Supprimer</button>
                        </form>
                        <a href="{{ route('categories.show',$categorie->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i>Voir les détails</a>

                    </td>
                    
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
     

@endsection