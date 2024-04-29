<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Hero;
use App\Models\Content;
use App\Models\Instagram;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $best = Menu::where('best', 1)
            ->get();
        $hero = Hero::where('status', 1)->orderby('first', 'desc')->get();
        $content = Content::first();

        return view('index', compact(['best', 'hero', 'content']));
    }

    public function receipe()
    {
        return view('receipe-post');
    }

    public function contact()
    {
        $content = Content::first();
        return view('contact', compact(['content']));
    }

    public function elements()
    {
        return view('elements');
    }

    public function about()
    {
        $content = Content::first();
        return view('about', compact(['content']));
    }
    public function blog()
    {
        return view('blog-post');
    }
    public function product()
    {
        $content = Content::first();
        return view('product', compact(['content']));
    }

    public function admin()
    {
        if (session::has('login')) {
            return view('admin');
        } else {
            return redirect('home');
        }
    }

    public function pages($path)
    {
        if (session::has('login')) {
            if ($path == 1) {
                $data = Menu::where('best', 1)->get();
                return view('pages-admin', compact(['data', 'path']));
            }
            if ($path == 0) {
                $data = Hero::where('status', 0)->get();
                return view('pages-admin', compact(['data', 'path']));
            }
        } else {
            return redirect('home');
        }
    }
}
