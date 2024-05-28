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
Route::GET('/pages/{path}', [HomeController::class, 'pages']);
Route::GET('/hero', [AdminController::class, 'dataHero'])->name('hero');
Route::GET('/best', [AdminController::class, 'dataBest'])->name('best');
Route::GET('/ig', [AdminController::class, 'dataIg'])->name('ig');
Route::GET('/tambah-hero/{id}/{idb}', [AdminController::class, 'edit']);
Route::POST('/kirim-hero', [AdminController::class, 'kirimHero']);
Route::GET('/tambahbest', [AdminController::class, 'tambahbest'])->name('tambahbest');

Route::GET('/updatebest/{id}/{val}', [AdminController::class, 'updateBest']);
Route::GET('/receipes-admin/{id}', [AdminController::class, 'receipes']);
Route::GET('/blog-admin/{id}', [AdminController::class, 'receipes']);
Route::GET('/product-admin/{id}', [AdminController::class, 'receipes']);
Route::GET('/content-admin/{id}', [AdminController::class, 'receipes']);


Route::GET('/receipes-trash/{id}', [AdminController::class, 'trash']);
Route::GET('/blog-trash/{id}', [AdminController::class, 'trash']);
Route::GET('/product-trash/{id}', [AdminController::class, 'trash']);

Route::GET('/edit-receipes/{id}/{idr}', [AdminController::class, 'edit']);
Route::GET('/edit-blog/{id}/{idb}', [AdminController::class, 'edit']);
Route::GET('/edit-hero/{id}/{idb}', [AdminController::class, 'edit']);
Route::GET('/edit-prod/{id}/{idp}', [AdminController::class, 'edit']);
Route::GET('/edit-content/{id}/{idc}', [AdminController::class, 'edit']);
Route::GET('/pinned/{id}', [AdminController::class, 'pinnedHero']);

Route::GET('/editbp/{id}/{idr}', [AdminController::class, 'editbp']);

Route::POST('/edit-actionr', [AdminController::class, 'editAction']);
Route::POST('/edit-actionbp', [AdminController::class, 'editActionbp']);

Route::GET('/delete-receipes/{id}/{idr}', [AdminController::class, 'delete']);
Route::GET('/delete-blog/{id}/{idb}', [AdminController::class, 'delete']);
Route::GET('/delete-hero/{id}/{idb}', [AdminController::class, 'delete']);
Route::DELETE('/delete-bahan/{idp}/{id}', [AdminController::class, 'deletebp'])->name('delete-bahan');

Route::GET('/remove-receipes/{id}/{ids}/{idr}', [AdminController::class, 'remove']);
Route::GET('/remove-blog/{id}/{ids}/{idr}', [AdminController::class, 'remove']);
Route::GET('/remove-product/{id}/{ids}/{idr}', [AdminController::class, 'remove']);
Route::GET('/remove-hero/{id}/{ids}/{idr}', [AdminController::class, 'remove']);

Route::GET('/clear-trash/{id}', [AdminController::class, 'clearTrash']);



Route::GET('/symlink', function () {
    $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/public/storage/public';
    symlink($targetFolder, $linkFolder);
    echo 'Success';
});
