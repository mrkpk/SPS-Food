<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function form_product()
    {
        if (session::has('login')) {

            return view('form-product');
        } else {
            return redirect('/product');
        }
    }

    public function kirimProduk(Request $request)
    {
        if (session::has('login')) {


            $produk = $request->all();
            $gambar = $request->file('gambar');


            $gambar_path = $gambar->storeAs('user_upload/gambar/product', 'product_' . uniqid() . '.' . $gambar->extension());

            $produk = Product::create([
                'nama_produk'  => $produk['produk'],
                'principal'    => $produk['principal'],
                'kategori'     => $produk['kategori'],
                'merk'         => $produk['merk'],
                'desk'         => $produk['desk'],
                'gambar'       => $gambar_path
            ]);
            return redirect('/product');
        } else {
            return redirect('/product');
        }
    }

    public function productCat($kategori)
    {
        $produk = Product::where('kategori', $kategori)
            ->get();
        return view('product-cat', compact(['produk', 'kategori']));
    }

    public function dataPro($id)
    {
        if ($id == 'LB') {
            $id = 'Langit Biru';
        }
        $data = Product::where([
            'kategori' => $id,
            'status' => 1
        ])
            ->select('*', DB::raw('REPLACE(desk, ";", "<br>") AS desk'))
            ->get();

        $cat = Category::where('kategori', $id)->first();
        return response()->json([
            'status' => 200,
            'data' => $data,
            'cat' => $cat
        ], 200);
    }
}
