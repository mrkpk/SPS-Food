<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Proses;
use App\Models\Bahan;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ReceipeController extends Controller
{
    public function index()
    {
        $menu = Menu::all()->sortByDesc("created_at");
        return view('receipe', compact(['menu']));
    }

    public function single_receipe($id)
    {
        $menu = Menu::where('id_menu', $id)
            ->first();
        $proses = Proses::where('id_menu', $id)
            ->orderBy('tahap', 'ASC')
            ->get();
        $bahan = Bahan::where('id_menu', $id)
            ->get();


        return view('single-receipe', compact(['menu', 'proses', 'bahan']));
    }

    public function form_receipe()
    {
        return view('form-receipe');
    }
    public function kirim_receipe(Request $request)
    {
        $menu = $request->except(['proses', 'bahan', '_token', 'gambar']);
        $gambar = $request->file('gambar');
        $gambar_path = $gambar->storeAs('user_upload/gambar/resep', 'resep_' . uniqid() . '.' . $gambar->extension());


        $video = $request->file('video');

        if ($video != null) {
            $video_path = $video->storeAs('user_upload/resep/video', 'Videoresep_' . uniqid() . '.' . $video->extension());
        } else {
            $video_path = null;
        }


        $porsi = Menu::create([
            'nama_menu' => $menu['nama'],
            'kategori'  => $menu['kategori'],
            'persiapan' => $menu['persiapan'],
            'durasi'    => $menu['durasi'],
            'porsi'     => $menu['porsi'],
            'id_pengirim' => 1,
            'gambar_path' => $gambar_path,
            'video_path' => $video_path
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
                'id_menu' => $lastID,
            ]);
        }
        return redirect('/receipe');
    }
}
