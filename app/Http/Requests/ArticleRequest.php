<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validation pour le champ 'nom_article'
            'nom_article' => [
                'required',         // Ce champ est obligatoire.
                'string',           // Il doit être une chaîne de caractères.
                'unique:articles,nom_article', // Il doit être unique dans la table `articles`.
                'max:255',          // La longueur maximale est de 255 caractères.
                'regex:/^[\w\sàâéèêëîïôûùüÿç\-]+$/', // Autorise les espaces, accents et tirets.
            ],

            // Validation pour le champ 'image'
            'image' => 'nullable|image|max:2000', // L'image est facultative et doit avoir une taille maximale de 2000 Ko.

            // Validation pour le champ 'quantite_stock'
            'quantite_stock' => 'required|numeric|min:1', // Requis, numérique, et doit être au moins 1.

            // Validation pour le champ 'prix'
            'prix' => 'required|numeric|min:1', // Requis, numérique, et doit être au moins 1.

            // Validation pour le champ 'categorie_id'
            'categorie_id' => [
                'required', // Le champ est obligatoire.
                'integer',  // Il doit être un entier.
                'exists:categories,id', // Il doit exister dans la table `categories` (colonne `id`).
            ],

            // Validation pour le champ 'categorie' (optionnel)
            'categorie' => 'nullable|string|max:255', // Champ facultatif, longueur maximale de 255 caractères.
        ];
    }
    public function messages()
{
    return [
        'categorie_id.required' => 'Veuillez sélectionner une catégorie.',
        'categorie_id.exists' => 'La catégorie sélectionnée n\'existe pas dans la base de données.',
    ];
}

}
