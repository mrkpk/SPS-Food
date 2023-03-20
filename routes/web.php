<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReceipeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::GET('/home', [HomeController::class, 'index']);
Route::GET('/contact', [HomeController::class, 'contact']);

Route::GET('/elements', [HomeController::class, 'elements']);

Route::GET('/receipe', [ReceipeController::class, 'index']);
Route::GET('/receipe-id/{id}', [ReceipeController::class, 'single_receipe']);
Route::GET('/form-resep', [ReceipeController::class, 'form_receipe']);
Route::POST('/tambah-receipe', [ReceipeController::class, 'kirim_receipe']);


Route::GET('/blog', [BlogController::class, 'index']);
Route::GET('/blog-id/{id}', [BlogController::class, 'singleBlog']);
Route::GET('/blog-form', [BlogController::class, 'formBlog']);
Route::POST('/tambah-blog', [BlogController::class, 'kirimBlog']);

Route::GET('/about', [HomeController::class, 'about']);

Route::GET('/product', [HomeController::class, 'product']);
Route::GET('/product-form', [ProductController::class, 'form_product']);
Route::POST('/tambah-produk', [ProductController::class, 'kirimProduk']);
Route::GET('/product-cat/{kategori}', [ProductController::class, 'productCat']);

Route::GET('/login', [AuthController::class, 'loginPage'])->name('login');
Route::POST('/login-action', [AuthController::class, 'login'])->name('login-action');
Route::GET('/logout', [AuthController::class, 'logout']);

Route::GET('/admin', [HomeController::class, 'admin']);
Route::GET('/pages', [HomeController::class, 'pages']);
Route::GET('/hero', [AdminController::class, 'dataHero'])->name('hero');
Route::GET('/best', [AdminController::class, 'dataBest'])->name('best');
Route::GET('/tambahbest', [AdminController::class, 'tambahbest'])->name('tambahbest');
Route::GET('/updatebest/{id}/{val}', [AdminController::class, 'updateBest']);
Route::GET('/receipes-admin/{id}', [AdminController::class, 'receipes']);
Route::GET('/blog-admin/{id}', [AdminController::class, 'receipes']);

Route::GET('/edit-receipes/{id}/{idr}', [AdminController::class, 'edit']);
Route::GET('/edit-blog/{id}/{idb}', [AdminController::class, 'edit']);
Route::GET('/edit-hero/{id}/{idb}', [AdminController::class, 'edit']);

Route::POST('/edit-actionr', [AdminController::class, 'editAction']);

Route::GET('/delete-receipes/{id}/{idr}', [AdminController::class, 'delete']);
Route::GET('/delete-blog/{id}/{idb}', [AdminController::class, 'delete']);
