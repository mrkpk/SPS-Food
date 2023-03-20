<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all()->sortByDesc("created_at");
        return view('blog', compact(['blog']));
    }

    public function singleBlog($id)
    {
        $blog = Blog::where('id_blog', $id)
            ->first();

        $another = Blog::whereNot('id_blog', $id)
            ->limit(4)
            ->get();
        return view('blog-single', compact(['blog', 'another']));
    }

    public function formBlog()
    {
        return view('blog-form');
    }

    public function kirimBlog(Request $request)
    {
        $blog = $request->all();
        $gambar = $request->file('gambar');
        $video = $request->file('video');
        $gambar_path = $gambar->storeAs('user_upload/gambar/blog', 'blog_' . uniqid() . '.' . $gambar->extension());


        $video = $request->file('video');

        if ($video != null) {
            $video_path = $video->storeAs('user_upload/video/blog', 'blog_' . uniqid() . '.' . $video->extension());
        } else {
            $video_path = null;
        }



        $blog = Blog::create([
            'judul_blog' => $blog['judul'],
            'kategori'  => $blog['kategori'],
            'isi_blog' => $blog['isi'],
            'pengirim' => 1,
            'gambar_blog' => $gambar_path,
            'video_blog' => $video_path
        ]);

        return redirect('/blog');
    }
}
