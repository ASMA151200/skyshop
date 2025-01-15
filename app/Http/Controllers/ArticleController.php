<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Categorie;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;





class ArticleController extends Controller
{
    public function affichage() {
        return view('dashboard');
    }

    public function index()
    {
    // // Récupérer les catégories
    // $categories = Categorie::all();
    //$categories= articles()->where('id', '>', '10');
    // Categorie::create([
    //     'nom_categorie'  => 'categorie A'
    // ]);
    // Categorie::create([
    //     'nom_categorie'  => 'categorie B'
    // ]);
    // Categorie::create([
    //     'nom_categorie'  => 'categorie C'
    // ]);
    // Categorie::create([
    //     'nom_categorie'  => 'categorie D'
    // ]);
  
    // Charger les articles avec leurs catégories
    $articles = Article::with('categorie')->paginate(10);
    
    return view('articles.index', compact('articles'));
    }

    // public function show(Article $article)
    // {
    // // L'article est déjà injecté grâce au model binding
    // //Si l'article n'existe pas (ex. si l'ID fourni n'est pas valide), Laravel retournera automatiquement une erreur 404.
    // return view('articles.show', compact('article'));
    // }
    
    //Si vous voulez gérer une redirection personnalisée (optionnel) : Si vous préférez rediriger au lieu d'une erreur 404
    public function show($id)
    {
    // Trouver l'article par son ID, incluant sa catégorie grâce à la relation
    $article = Article::with('categorie')->find($id);

    // Si l'article n'existe pas, rediriger avec un message d'erreur
    if (!$article) {
        return redirect()->route('articles.index')->with('error', 'Article non trouvé');
    }

    // Retourner la vue avec l'article trouvé
    return view('articles.show', compact('article'));
    }


    

    public function create()
    {
    $categories = Categorie::all();
    return view('articles.create', compact('categories'));
    }


 

    public function store(Request $request)
{
    // Validation des données
    $validatedData = $request->validate([
        'nom_article' => 'required|string|max:255',
        'quantite_stock' => 'required|integer|min:0',
        'prix' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image facultative
        'categorie_id' => 'required|exists:categories,id',
    ]);

    // Gestion de l'upload de l'image (si présente)
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    // Création de l'article
    Article::create($validatedData);

    // Redirection avec message de succès
    return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès.');
}


    
    public function edit(Article $article)
    {
        $categories = Categorie::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        try {
         
        $article->update($this->extractData($article, $request));
            return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de l\'article.');
        }
    }
    private function extractData(Article $article, ArticleRequest $request): array
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image===null || $image->getError()){
            return $data;
        }
        if($article->image){
            Storage::disk('public')->delete($article->image);

        }        
         $data['image']= $image->store('articles', 'public');
        return $data;
    }

    public function destroy(Article $article)
    {
        try {
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur s\'est produite lors de la suppression de l\'article.');
        }
    }


}
 