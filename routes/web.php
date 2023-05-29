<?php

use App\Http\Controllers\DeptController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;


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

Route::get('home', function () {
    return view('home');
})->middleware('auth')->name('home');

// route pour afficher tous les départements
Route::get('/dept', [DeptController::class, 'displayAll'])->middleware('auth')->name('dept.displayAll');

// route pour afficher les détails d'un département
Route::get('/dept/{id}', [DeptController::class, 'display'])->middleware('auth')->name('dept.detail');

// route pour retourner le formulaire de création de département
Route::get('/nouveaudept', [DeptController::class, 'create'])->middleware('auth')->name('dept.create');
// route pour gérer la soumission du formulaire de création de département
Route::post('/nouveaudept', [DeptController::class, 'store'])->middleware('auth')->name('dept.store');

// route pour retourner le formulaire de création de département
Route::get('/modifierdept/{id}', [DeptController::class, 'modify'])->middleware('auth')->name('dept.modify');
// route pour gérer la soumission du formulaire de création de département
Route::post('/modifierdept/{id}', [DeptController::class, 'update'])->middleware('auth')->name('dept.update');

// route pour supprimer
Route::post('/supprimerdept', [DeptController::class, 'delete'])->middleware('auth')->name('dept.delete');
