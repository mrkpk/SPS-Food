<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function form_product()
    {
        return view('form-product');
    }

    public function kirimProduk(Request $request)
    {
        $produk = $request->all();
        $gambar = $request->file('gambar');

        $gambar_path = $gambar->storeAs('user_upload/gambar/product', 'product_' . uniqid() . '.' . $gambar->extension());

        $produk = Product::create([
            'nama_produk'  => $produk['produk'],
            'principal'    => $produk['principal'],
            'kategori'     => $produk['kategori'],
            'merk'         => $produk['merk'],
            'gambar'       => $gambar_path
        ]);
        return redirect('/product');
    }

    public function productCat($kategori)
    {
        $produk = Product::where('kategori', $kategori)
            ->get();
        return view('product-cat', compact(['produk', 'kategori']));
    }
}
