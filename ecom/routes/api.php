<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// produits
Route::Get('/produits/all',[ProduitController::class, 'getProducts']);
Route::Post('/produits/add',[ProduitController::class, 'addProduct']);
Route::Post('/produits/update/{id}',[ProduitController::class, 'updateProduct']);
Route::Post('/produits/delete/{id}',[ProduitController::class, 'deleteProduct']);

// categories
Route::Get('/categories/all',[CategorieController::class, 'getCategories']);
Route::Post('/categories/add',[CategorieController::class, 'addCategorie']);
Route::Post('/categories/update/{id}',[CategorieController::class, 'updateCategorie']);
Route::Post('/categories/delete/{id}',[CategorieController::class, 'deleteCategorie']);

// clients => users

Route::Get('/clients/all',[ClientController::class, 'getClients']);
Route::Post('/clients/add',[ClientController::class, 'addClient']);
Route::Post('/clients/update/{id}',[ClientController::class, 'updateClient']);
Route::Post('/clients/delete/{id}',[ClientController::class, 'deleteClient']);