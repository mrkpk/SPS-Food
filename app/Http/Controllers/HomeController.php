<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Hero;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $best = Menu::where('best', 1)
            ->get();
        $hero = Hero::all();

        return view('index', compact(['best', 'hero']));
    }

    public function receipe()
    {
        return view('receipe-post');
    }

    public function contact()
    {
        return view('contact');
    }

    public function elements()
    {
        return view('elements');
    }

    public function about()
    {
        return view('about');
    }
    public function blog()
    {
        return view('blog-post');
    }
    public function product()
    {
        return view('product');
    }

    public function admin()
    {
        if (session::has('login')) {
            return view('admin');
        } else {
            return redirect('home');
        }
    }

    public function pages()
    {
        if (session::has('login')) {
            $data = Menu::where('best', 1)->get();
            return view('pages-admin', compact(['data']));
        } else {
            return redirect('home');
        }
    }
}
