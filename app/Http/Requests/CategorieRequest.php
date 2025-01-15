<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nom_categorie' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/', // Autoriser uniquement des lettres et des espaces
                'unique:categories,nom_categorie,' . $this->route('categorie'),  // Exclut l'ID pour l'update
            ],

            'desc_categorie' => [
            'required',
            'string',
            'max:500',
            'regex:/^[\w\s\.,;!_\'"-]*$/',
            // Autoriser uniquement des lettres, des espaces, des points, des virgules, des exclamaisons, des guillemets, des apostrophes, des tirets, des underscores, des guillemets doubles, des quotes simples et des quotes doubles.
              
        ],
        ];
    }

    public function messages()
    {
        return [
            'nom_categorie.required' => 'Le nom de la catégorie est obligatoire.',
            'nom_categorie.string' => 'Le nom de la catégorie doit être une chaîne de caractères.',
            'nom_categorie.max' => 'Le nom de la catégorie ne peut pas dépasser 255 caractères.',
            'nom_categorie.regex' => 'Le nom de la catégorie ne peut contenir que des lettres et des espaces.',
            'nom_categorie.unique' => 'Le nom de la catégorie existe déjà. Veuillez choisir un autre nom.',
            'desc_categorie.required' => 'La description de la catégorie est obligatoire.',
            'desc_categorie.string' => 'La description de la catégorie doit être une chaîne de caractères.',
            'desc_categorie.max' => 'La description de la catégorie ne peut pas dépasser 500 caractères.',
            'desc_categorie.regex' => 'La description de la catégorie ne peut contenir que des lettres, des espaces, des points, des virgules, des exclamaisons, des guillemets, des apostrophes, des tirets, des underscores, des guillemets doubles, des quotes simples et des quotes doubles.',
            


        ];
    }
}