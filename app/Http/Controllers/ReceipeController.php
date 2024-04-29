<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Proses;
use App\Models\Bahan;
use App\Models\Content;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class ReceipeController extends Controller
{
    public function index()
    {
        $menus = Menu::where('status', 1)->orderBy('created_at', 'DESC')->Paginate(12);
        $content = Content::first();
        return view('receipe', compact(['menus', 'content']));
    }

    public function single_receipe($id)
    {
        $menu = Menu::where('id_menu', $id)
            ->first();
        $proses = Proses::where('id_menu', $id)
            ->orderBy('tahap', 'ASC')
            ->get();
        $bahan = Bahan::where('id_menu', $id)
            ->where('section_ke', 2)
            ->get();
        $bumbu = Bahan::where('id_menu', $id)
            ->where('section_ke', 1)
            ->get();


        return view('single-receipe', compact(['menu', 'proses', 'bahan', 'bumbu']));
    }

    public function form_receipe()
    {
        if (session::has('login')) {

            return view('form-receipe');
        } else {
            return redirect('/receipe');
        }
    }
    public function kirim_receipe(Request $request)
    {
        if (session::has('login')) {
            $menu = $request->except(['proses', 'bahan', '_token', 'gambar']);
            $gambar = $request->file('gambar');
            $gambar_path = $gambar->storeAs('user_upload/gambar/resep', 'resep_' . uniqid() . '.' . $gambar->extension());


            $video = $request->file('video');

            if ($video != null) {
                $video_path = $video->storeAs('user_upload/resep/video', 'Videoresep_' . uniqid() . '.' . $video->extension());
            } else {
                $video_path = null;
            }

            if ($menu['link'] != null) {
                $link = $menu['link'];
            } else {
                $link = null;
            }
            $oleh = $request->filled('oleh') ? $request->input('oleh') : null;
            $persiapan = $request->filled('persiapan') ? $request->input('persiapan') : 0;
            $durasi = $request->filled('durasi') ? $request->input('durasi') : 0;
            $porsi = $request->filled('porsi') ? $request->input('porsi') : 0;

            $porsi = Menu::create([
                'nama_menu' => $menu['nama'],
                'kategori'  => $menu['kategori'],
                'oleh' => $oleh,
                'persiapan' => $persiapan,
                'durasi'    => $durasi,
                'porsi'     => $porsi,
                'id_pengirim' => 1,
                'gambar_path' => $gambar_path,
                'video_path' => $video_path,
                'link' => $link

            ]);



            $lastID = $porsi->id_menu;


            $data = $request->input('proses.*');
            $l = count($data);
            for ($i = 0; $i < $l; $i++) {
                Proses::create([
                    'proses' => $data[$i],
                    'tahap' => $i,
                    'id_menu' => $lastID,
                ]);
            }

            $data = $request->input('bahan.*');
            $l = count($data);
            for ($i = 0; $i < $l; $i++) {
                Bahan::create([
                    'bahan' => $data[$i],
                    'ke' => $i,
                    'section_ke' => 2,
                    'id_menu' => $lastID,
                ]);
            }
            $data = $request->input('bumbu.*');
            $l = count($data);
            for ($i = 0; $i < $l; $i++) {
                Bahan::create([
                    'bahan' => $data[$i],
                    'ke' => $i,
                    'section_ke' => 1,
                    'id_menu' => $lastID,
                ]);
            }
            return redirect('/receipe');
        } else {
            return redirect('/product');
        }
    }
}
