<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Menu;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dataHero()
    {
        $data = Hero::all();

        return response()->json($data);
    }

    public function dataBest()
    {
        $data = Menu::where('best', 1)->get();
        return response()->json($data);
    }

    public function tambahbest()
    {
        $data = Menu::where('best', 0)->get();
        return response()->json($data);
    }

    public function updateBest($id_menu, $value)
    {
        $menu = Menu::where('id_menu', $id_menu)
            ->update(['best' => $value]);
        $data = Menu::where('best', 1)
            ->get();
        return response()->json($data);
    }

    public function receipes($id)
    {

        if ($id == 1) {
            $data = Menu::all();
            return view('tables-rec', compact(['data']));
        } elseif ($id == 2) {
            $data = Blog::all();

            return view('tables-blo', compact(['data']));
        }
    }

    public function edit($id, $idr)
    {
        if ($id == 1) {
            $data = Menu::where('id_menu', $idr)->first();
            return view('edits', compact(['data', 'id']));
        } elseif ($id == 2) {
            $data = Blog::where('id_blog', $idr)->first();
            return view('edits', compact(['data', 'id']));
        } elseif ($id == 3) {
            $data = Hero::where('id_modal', $idr)->first();
            return view('edits', compact(['data', 'id']));
        }
    }
    public function delete($id, $idr)
    {
        if ($id == 1) {
            $data = Menu::find($idr);
            if ($data->gambar_path != null) {
                Storage::delete($data->gambar_path);
            }
            if ($data->video_path != null) {
                Storage::delete($data->video_path);
            }
            $data->delete();

            return redirect('/receipes-admin/' . $id);
        } elseif ($id == 2) {
            $data = Blog::find($idr);
            if ($data->gambar_blog != null) {
                Storage::delete($data->gambar_blog);
            }
            if ($data->video_blog != null) {
                Storage::delete($data->video_blog);
            }
            $data->delete();
            return redirect('/blog-admin/' . $id);
        }
    }

    public function editAction(Request $req)
    {
        $d = $req->all();
        if ($d['path'] == 1) {
            $data = Menu::find($d['id_menu']);

            if (isset($d['gambar'])) {
                Storage::delete($data->gambar_path);

                $gambar = $req->file('gambar');
                $gambar_path = $gambar->storeAs('user_upload/gambar/resep', 'resep_' . uniqid() . '.' . $gambar->extension());
                $data->update(['gambar_path' => $gambar_path]);
            }
            if (isset($d['video'])) {
                if ($data->video_path) {
                    Storage::delete($data->video_path);
                }
                $video = $req->file('video');
                $video_path = $video->storeAs('user_upload/video/resep', 'Videoresep_' . uniqid() . '.' . $video->extension());
                $data->update(['video_path' => $video_path]);
            }
            $data
                ->update([
                    'nama_menu' => $d['nama_resep'],
                    'kategori' => $d['kategori_resep'],
                    'persiapan' => $d['persiapan'],
                    'durasi' => $d['durasi'],
                    'porsi' => $d['porsi']

                ]);

            return redirect('/receipes-admin/' . $d['path']);
        } elseif ($d['path'] == 2) {
            $data = Blog::find($d['id_blog']);

            if (isset($d['gambar'])) {
                Storage::delete($data->gambar_blog);

                $gambar = $req->file('gambar');
                $gambar_path = $gambar->storeAs('user_upload/gambar/blog', 'blog_' . uniqid() . '.' . $gambar->extension());
                $data->update(['gambar_blog' => $gambar_path]);
            }
            if (isset($d['video'])) {
                if ($data->video_blog) {
                    Storage::delete($data->video_blog);
                }
                $video = $req->file('video');
                $video_path = $video->storeAs('user_upload/video/blog', 'blog_' . uniqid() . '.' . $video->extension());
                $data->update(['video_blog' => $video_path]);
            }
            $data
                ->update([
                    'judul_blog' => $d['judul'],
                    'kategori' => $d['kategori'],
                    'isi_blog' => $d['isi']


                ]);

            return redirect('/blog-admin/' . $d['path']);
        } elseif ($d['path'] == 3) {
            $data = Hero::find($d['id_modal']);

            if (isset($d['gambar'])) {
                Storage::delete($data->gambar);

                $gambar = $req->file('gambar');
                $gambar_path = $gambar->storeAs('user_upload/gambar/hero', 'bg' . $data->id_modal . '.' . $gambar->extension());
                $data->update(['gambar' => $gambar_path]);
            }
            $data
                ->update([
                    'nama' => $d['judul'],
                    'deskripsi' => $d['deskripsi']
                ]);

            return redirect('/pages');
        }
    }
}
