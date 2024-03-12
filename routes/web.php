<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\CommandeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// les routes de classe chauffeurs
Route::get('/liste', [ChauffeurController::class, 'liste_chauffeur']);
Route::get('/ajouter', [ChauffeurController::class, 'ajouter_chauffeur']);
Route::post('/ajouter/traitement', [ChauffeurController::class, 'ajouter_chauffeur_traitement']);
Route::get('/modifier/{id}', [ChauffeurController::class, 'modifier_chauffeur']);
Route::post('/modifier/traitement', [ChauffeurController::class, 'modifierChauffeur_traitement']);
Route::get('/supprimer/{id}', [ChauffeurController::class, 'supprimer_chauffeur']);

//les routes de la classe voiture
Route::get('voiture', [VoitureController::class, 'listeVoiture']);
Route::get('/modifiervoiture/{id}', [VoitureController::class, 'modifierVoiture']);
Route::post('/modifiervoiture/traitement', [VoitureController::class, 'modifierVoiture_traitement']);
Route::get('/ajoutervoiture', [VoitureController::class, 'ajouterVoiture']);
Route::post('/ajoutervoiture/traitement', [VoitureController::class, 'ajouterVoiture_traitement']);
Route::get('/supprimervoiture/{id}', [VoitureController::class, 'supprimerVoiture']);

//les routes de la classe commande
Route::get('/commande', [CommandeController:: class, 'Commande']);
Route::post('/commande/traitement', [CommandeController:: class, 'PasserCommandeTraitement']);
Route::get('/vuecom', [CommandeController:: class, 'VoirCommande']);
Route::get('/vuecom/{id}', [CommandeController::class, 'VoirCommande'])->name('vuecom');



