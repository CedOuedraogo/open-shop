<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FormationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class,'accueil'])->name('accueil');

//  gestion des produits
Route::resource('produits', ProduitController::class);


 Route::get('index',[FormationController::class,'index']);
 
 Route::get('ajouter-produit',[FormationController::class,'ajouterProduit']);/*
 Route::get('update',[FormationController::class,'updateProduit']);
 //Route::get('update2/{id}',[FormationController::class,'updateProduit2']); (same1 )
 Route::get('update2/{produit}',[FormationController::class,'updateProduit2']); //(same1)
 Route::get('suppression-produit',[FormationController::class,'suppressionProduit']); //(pour supprimer)

 Route::resource('produits', ProduitController::class);*/


 /* Route::prefix('e-burkina')->group(function() {

    route::get('formationSwitchMaker/{nb}',[FormationController::class, 'formationSwitchMaker']);
    Route::get('index',[FormationController::class,'index']);
                                               }); */                //pour rassembler un groupe de route