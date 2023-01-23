<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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

//All Listings
Route::get('/', [ListingController::class, 'index']);

// Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Edit Submit to update
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show Apply Form
Route::get('/listings/applyTo/{listing}', [ApplicationController::class, 'create'])->middleware('auth');

Route::post('/listings/submitApplyTo/{listing}', [ApplicationController::class, 'store'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


//Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Show login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In
Route::post('/users/authenticate', [UserController::class, 'authenticate']);




// Route::get('/hello', function () {
//     return response('<h1>Hello World<h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('Foo', 'bar');
// });

// Route::get('/posts/{id}', function($id){
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request){
//     dd($request->name);
// });
