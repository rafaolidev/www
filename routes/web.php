<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;

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
//Route::model('dog', 'App\Models\ModelDog');

 Route::get('/dogs/{dog}', [DogController::class, 'show']);

//Rota principal de listagem de cachorros.
Route::resource('/dogs', [DogController::class, 'index']);

//Rota para cadastro.
Route::post('/dogs/create', [DogController::class,'store']);

//Rota para deleter registro.
Route::put('/dogs/{dog}', [DogController::class, 'update']);

Route::delete('/delete/dogs/{dog}', [DogController::class, 'destroy'])
