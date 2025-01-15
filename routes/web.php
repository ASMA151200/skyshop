<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PanierController;
use Illuminate\Support\Facades\Route;

// Route pour le tableau de bord
Route::get("/", [ArticleController::class, 'Affichage'])->name("dashboard");

// Groupe de routes avec le préfixe 'articles'
Route::prefix('articles')->name('articles.')->group(function () {
    Route::get('{id}', [ArticleController::class, 'show'])->where('id', '[0-9]+')->name('show');
    Route::get('index', [ArticleController::class, 'index'])->name('index');
    Route::get('create', [ArticleController::class, 'create'])->name('create');
    Route::post('store', [ArticleController::class, 'store'])->name('store');
    Route::get('{article}/edit', [ArticleController::class, 'edit'])->name('edit');
    Route::put('{article}', [ArticleController::class, 'update'])->name('update');
    Route::delete('{article}', [ArticleController::class, 'destroy'])->name('destroy');
});

Route::prefix('panier')->name('panier.')->group(function () {
    Route::get('afficher', [PanierController::class, 'afficher'])->name('afficher');
    Route::get('ajouter/{id}', [PanierController::class, 'ajouter'])->where('id', '[0-9]+')->name('ajouter');
    Route::post('supprimer/{id}', [PanierController::class, 'supprimer'])->where('id', '[0-9]+')->name('supprimer'); // Changer en POST
    Route::post('vider', [PanierController::class, 'vider'])->name('vider'); // Changer en POST
    Route::get('paiement', [PanierController::class, 'paiement'])->name('paiement');
});


// Routes pour les catégories
Route::resource('categories', CategorieController::class);

Route::get('/payments/success', [paymentController::class, 'success'])->name('payment.success');
Route::get('/payments/cancel', [paymentController::class, 'cancel'])->name('payment.cancel');
Route::post('/payments/initiate', [paymentController::class, 'initiatePayment'])->name('payment.initiate');


// Route pour afficher la page de checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

// Route pour afficher la page de paiement
Route::get('paiement/{name}/{phone}/{email}', [PaymentController::class, 'show'])->name('payment.show');

// Route pour afficher le récapitulatif du paiement
Route::get('payment/recap', [PaymentController::class, 'show'])->name('payment.recap');
