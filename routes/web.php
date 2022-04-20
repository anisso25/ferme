<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'App\Http\Controllers\ClientController@home');
Route::get('/shop','App\Http\Controllers\ClientController@shop');
Route::get('/panier','App\Http\Controllers\ClientController@panier');
Route::get('/client_login','App\Http\Controllers\ClientController@client_login');
Route::get('/signup','App\Http\Controllers\ClientController@signup');
Route::get('/paiment','App\Http\Controllers\ClientController@paiment');
Route::get('/select_par_cat/{name}','App\Http\Controllers\ClientController@select_par_cat');
Route::get('/ajouter_au_panier/{id}','App\Http\Controllers\ClientController@ajouter_au_panier');

Route::get('/dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/commandes','App\Http\Controllers\AdminController@commandes');

Route::get('/ajoutercategorie','App\Http\Controllers\CategoryController@ajoutercategorie');
Route::post('/sauvercategorie','App\Http\Controllers\CategoryController@sauvercategorie');
Route::get('/categories','App\Http\Controllers\CategoryController@categories');
Route::get('/edit_categorie/{id}','App\Http\Controllers\CategoryController@edit_categorie');
Route::post('/modifiercategorie','App\Http\Controllers\CategoryController@modifiercategorie');
Route::get('/supprimercategorie/{id}','App\Http\Controllers\CategoryController@supprimercategorie');

Route::get('/ajouterproduit','App\Http\Controllers\ProdectController@ajouterproduit');
Route::post('/sauverproduit','App\Http\Controllers\ProdectController@sauverproduit');
Route::get('/produits','App\Http\Controllers\ProdectController@produits');
Route::get('/edit_produit/{id}', 'App\Http\Controllers\ProdectController@edit_produit')->name('edit_product');
Route::put('/modifierproduit','App\Http\Controllers\ProdectController@modifierproduit');
Route::get('/supprimerproduit/{id}','App\Http\Controllers\ProdectController@supprimerproduit');

Route::get('/activer_produit/{id}','App\Http\Controllers\ProdectController@activer_produit');
Route::get('/desactiver_produit/{id}','App\Http\Controllers\ProdectController@desactiver_produit');

Route::get('/ajouteslider','App\Http\Controllers\SliderController@ajouterslider');
Route::post('/sauverslider','App\Http\Controllers\SliderController@sauverslider');
Route::get('/sliders','App\Http\Controllers\SliderController@sliders');
Route::get('/edit_slider/{id}', 'App\Http\Controllers\SliderController@edit_slider')->name('edit_slider');
Route::post('/modifierslider','App\Http\Controllers\SliderController@modifierslider');
Route::get('/supprimerslider/{id}','App\Http\Controllers\SliderController@supprimerslider');

Route::get('/activer_slider/{id}','App\Http\Controllers\SliderController@activer_slider');
Route::get('/desactiver_slider/{id}','App\Http\Controllers\SliderController@desactiver_slider');
