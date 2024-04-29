<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Menu;
use App\Models\Bahan;
use App\Models\Proses;
use App\Models\Content;
use App\Models\Blog;
use App\Models\Instagram;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dataHero()
    {
        $data = Hero::where('status', 1)->orderby('first', 'desc')->get();

        return response()->json($data);
    }

    public function dataBest()
    {
        $data = Menu::where('best', 1)->get();
        return response()->json($data);
    }

    public function dataIg()
    {
        $data = Instagram::all();
        return response()->json($data);
    }

    public function tambahbest()
    {
        $data = Menu::where('best', 0)->get();
        return response()->json($data);
    }
    public function tambahhero()
    {
        if (session::has('login')) {
            return view('tambah-hero');
        } else {
            return redirect('home');
        }
    }

    public function updateBest($id_menu, $value)
    {
        if (session::has('login')) {

            $menu = Menu::where('id_menu', $id_menu)
                ->update(['best' => $value]);
            $data = Menu::where('best', 1)
                ->get();
            return response()->json($data);
        } else {
            return redirect('home');
        }
    }

    public function receipes($id)
    {
        if (session::has('login')) {
            $type = 1;
            if ($id == 1) {

                $data = Menu::where('status', 1)->get();
                return view('tables-rec', compact(['data', 'type']));
            } elseif ($id == 2) {
                $data = Blog::where('status', 1)->get();

                return view('tables-blo', compact(['data', 'type']));
            } elseif ($id == 3) {
                $data = Product::orderBy('kategori', 'asc')->where('status', 1)->get();
                return view('tables-pro', compact(['data', 'type']));
            } elseif ($id == 4) {
                $data = Content::first();

                return view('tables-con', compact(['data']));
            } elseif ($id == 5) {
                $data = Category::orderBy('kategori', 'asc')->get();
                return view('tables-cat', compact(['data']));
            }
        } else {
            return redirect('home');
        }
    }
    public function trash($id)
    {
        if (session::has('login')) {
            if ($id == 1) {
                $type = 0;
                $data = Menu::where('status', 0)->get();
                return view('tables-rec', compact(['data', 'type']));
            } elseif ($id == 2) {
                $data = Blog::where('status', 0)->get();
                $type = 0;
                return view('tables-blo', compact(['data', 'type']));
            } elseif ($id == 3) {
                $type = 0;
                $data = Product::orderBy('kategori', 'asc')->where('status', 0)->get();
                return view('tables-pro', compact(['data', 'type']));
            } elseif ($id == 4) {
                $data = Content::first();

                return view('tables-con', compact(['data']));
            }
        } else {
            return redirect('home');
        }
    }

    public function edit($id, $idr)
    {
        if (session::has('login')) {

            if ($id == 1) {
                $data = Menu::where('id_menu', $idr)->first();
                return view('edits', compact(['data', 'id']));
            } elseif ($id == 2) {
                $data = Blog::where('id_blog', $idr)->first();
                return view('edits', compact(['data', 'id']));
            } elseif ($id == 3) {
                $data = Hero::where('id_modal', $idr)->first();
                return view('edits', compact(['data', 'id']));
            } elseif ($id == 4) {
                return view('edits', compact(['id']));
            } elseif ($id == 5) {
                $data = Product::where('id_produk', $idr)->first();
                return view('edits', compact(['data', 'id']));
            } elseif ($id == 6) {
                $data = Content::first();
                return view('edits', compact(['data', 'id']));
            } elseif ($id == 7) {
                $data = Category::where('id_cat', $idr)->first();
                return view('edits', compact(['data', 'id']));
            }
        } else {
            return redirect('home');
        }
    }

    public function kirimHero(Request $request)
    {
        $gambar = $request->file('gambar');
        $gambar_path = $gambar->storeAs('user_upload/gambar/hero', 'bg' . uniqid() . '.' . $gambar->extension());

        $deskripsi = $request->filled('deskripsi') ? $request->input('deskripsi') : null;
        $judul = $request->filled('judul') ? $request->input('judul') : null;
        $hr = Hero::create([
            'nama'  => $judul,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar_path
        ]);

        return redirect('/pages/1');
    }
    public function remove($id, $ids, $idr)
    {
        if (session::has('login')) {
            if ($id == 1) {
                $data = Menu::find($idr);
                if ($ids == 1) {
                    $data
                        ->update(['status' => 0]);
                }
                if ($ids == 0) {
                    $data
                        ->update(['status' => 1]);
                }
                return redirect('/receipes-admin/' . $id);
            } elseif ($id == 2) {
                $data = Blog::find($idr);

                if ($ids == 1) {
                    $data
                        ->update(['status' => 0]);
                    return redirect('/blog-admin/' . $id);
                }
                if ($ids == 0) {
                    $data
                        ->update(['status' => 1]);
                    return redirect('/blog-admin/' . $id);
                }
                return redirect('/blog-admin/' . $id);
            } elseif ($id == 3) {
                $data = Hero::find($idr);
                if ($ids == 1) {
                    $data
                        ->update([
                            'status' => 0,
                            'first' => 0
                        ]);
                    return redirect('/pages/1');
                }
                if ($ids == 0) {
                    $data
                        ->update(['status' => 1]);
                    return redirect('/pages/0');
                }
            } elseif ($id == 5) {
                $data = Product::find($idr);

                if ($ids == 1) {
                    $data
                        ->update(['status' => 0]);
                    return redirect('/product-admin/3');
                }
                if ($ids == 0) {
                    $data
                        ->update(['status' => 1]);
                    return redirect('/product-admin/3');
                }
                return redirect('/product-admin/3');
            }
        } else {
            return redirect('home');
        }
    }

    public function delete($id, $idr)
    {
        if (session::has('login')) {

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
            } elseif ($id == 3) {
                $data = Hero::find($idr);
                if ($data->gambar != null) {
                    Storage::delete($data->gambar);
                }
                $data->delete();
                return redirect('/pages/1');
            }
        } else {
            return redirect('home');
        }
    }

    public function editAction(Request $req)
    {
        if (session::has('login')) {
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
                if ($d['link'] != null) {
                    $link = $d['link'];
                } else {
                    $link = null;
                }

                $oleh = $req->filled('oleh') ? $req->input('oleh') : null;
                $data
                    ->update([
                        'nama_menu' => $d['nama_resep'],
                        'kategori' => $d['kategori_resep'],
                        'persiapan' => $d['persiapan'],
                        'durasi' => $d['durasi'],
                        'porsi' => $d['porsi'],
                        'link'  => $link,
                        'oleh'  => $oleh

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
                    $video_path = $video->storeAs('public/user_upload/video/blog', 'blog_' . uniqid() . '.' . $video->extension());
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
                    $ext = $gambar->extension();
                    $gambar_path = $gambar->storeAs('public/user_upload/gambar/hero', 'bg' . $data->id_modal . '.' . strtolower($ext));
                    $data->update(['gambar' => $gambar_path]);
                }
                $data
                    ->update([
                        'nama' => $d['judul'],
                        'deskripsi' => $d['deskripsi']
                    ]);

                return redirect('/pages/1');
            } elseif ($d['path'] == 4) {
                $data = Product::find($d['id_produk']);

                if (isset($d['gambar'])) {
                    Storage::delete($data->gambar);

                    $gambar = $req->file('gambar');
                    $ext = $gambar->extension();
                    $gambar_path = $gambar->storeAs('user_upload/gambar/product', 'product_' . $data->id_produk . '.' . strtolower($ext));
                    $data->update(['gambar' => $gambar_path]);
                }
                $data
                    ->update([
                        'nama_produk' => $d['nama'],
                        'principal' => $d['principal'],
                        'kategori' => $d['kategori'],
                        'desk'     => $d['desk']
                    ]);

                return redirect('/product-admin/3');
            } elseif ($d['path'] == 6) {
                $data = Content::first();
                $data
                    ->update([
                        'prim_about' => $d['prim_about'],
                        'sec_about' => $d['sec_about'],
                        'visi' => $d['visi'],
                        'misi' => $d['misi'],
                        'desc_cont' => $d['desc_cont'],
                        'alamat1' => $d['alamat1'],
                        'alamat2' => $d['alamat2'],
                        'no_hp1' => $d['no_hp1'],
                        'no_hp2' => $d['no_hp2'],
                        'no_hp3' => $d['no_hp3'],
                        'email1' => $d['email1'],
                        'email2' => $d['email2'],
                        'email3' => $d['email3'],
                        'tentang_home' => $d['tentang_home'],
                        'resep_desc' => $d['resep_desc'],
                        'produk_desc' => $d['produk_desc'],




                    ]);

                return redirect('/content-admin/4');
            } elseif ($d['path'] == 7) {
                $data = Category::find($d['id_cat']);

                if (isset($d['gambar'])) {
                    Storage::delete($data->path);

                    $gambar = $req->file('gambar');
                    $ext = $gambar->extension();
                    $gambar_path = $gambar->storeAs('/img/logo', 'cat_' . $data->id_cat . '.' . strtolower($ext));

                    $data->update(['path' => $gambar_path]);
                }
                $data
                    ->update([
                        'kategori' => $d['kategori'],
                        'desk' => $d['desk']
                    ]);

                return redirect('/content-admin/5');
            }
        } else {
            return redirect('home');
        }
    }
    public function editbp($id, $idr)
    {
        if (session::has('login')) {

            if ($id == 1) {
                $bahan = Bahan::where('id_menu', $idr)
                    ->where('section_ke', 2)
                    ->get();
                $bumbu = Bahan::where('id_menu', $idr)
                    ->where('section_ke', 1)
                    ->get();
                $menu = Menu::where('id_menu', $idr)->first();
                return view('editbp', compact(['bahan', 'bumbu', 'menu', 'id']));
            } elseif ($id == 2) {
                $proses = Proses::where('id_menu', $idr)
                    ->get();
                $menu = Menu::where('id_menu', $idr)->first();
                return view('editbp', compact(['proses', 'menu', 'id']));
            }
        } else {
            return redirect('home');
        }
    }

    public function pinnedHero($id)
    {
        $data = Hero::get();
        foreach ($data as $record) {
            $record->update(['first' => 0]);
        }

        $pinned = Hero::find($id);
        $pinned->update(['first' => 1]);
        return redirect('/pages/1');
    }

    public function editActionbp(Request $req)
    {
        if (session::has('login')) {
            $d = $req->all();
            if ($d['path'] == 1) {
                $id_menu = $req->input('id_menu');
                $bumbu = $req->input('bumbu.*');
                $id_bumbu = $req->input('id_bumbu.*');

                if (isset($bumbu)) {
                    for ($i = 0; $i < count($bumbu); $i++) {
                        if (!isset($id_bumbu[$i])) {
                            Bahan::create([
                                'bahan' => $bumbu[$i],
                                'ke' => ($i + 1),
                                'section_ke' => 1,
                                'id_menu' => $id_menu,
                            ]);
                        }
                        if (isset($id_bumbu[$i])) {
                            $data = Bahan::find($id_bumbu[$i]);
                            $data->update([
                                'ke' => ($i + 1),
                                'bahan' => $bumbu[$i]
                            ]);
                        }
                    }
                }
                $bahan = $req->input('bahan.*');
                $id_bahan = $req->input('id_bahan.*');
                if (isset($bahan)) {
                    for ($i = 0; $i < count($bahan); $i++) {
                        if (!isset($id_bahan[$i])) {
                            Bahan::create([
                                'bahan' => $bahan[$i],
                                'ke' => ($i + 1),
                                'section_ke' => 2,
                                'id_menu' => $id_menu,
                            ]);
                        }
                        if (isset($id_bahan[$i])) {
                            $data = Bahan::find($id_bahan[$i]);
                            $data->update([
                                'ke' => ($i + 1),
                                'bahan' => $bahan[$i]
                            ]);
                        }
                    }
                }
                return redirect('/editbp/1/' . $id_menu);
            }
            if ($d['path'] == 2) {
                $id_menu = $req->input('id_menu');
                $proses = $req->input('proses.*');
                $id_proses = $req->input('id_proses.*');
                for ($i = 0; $i < count($proses); $i++) {
                    if (!isset($id_proses[$i])) {
                        Proses::create([
                            'proses' => $proses[$i],
                            'tahap' => ($i + 1),
                            'id_menu' => $id_menu,
                        ]);
                    }
                    if (isset($id_proses[$i])) {
                        $data = Proses::find($id_proses[$i]);
                        $data->update([
                            'tahap' => ($i + 1),
                            'proses' => $proses[$i]
                        ]);
                    }
                }

                return redirect('/editbp/2/' . $id_menu);
            }
        }
    }
    public function deletebp($idp, $id)
    {
        if ($idp == 1) {
            Bahan::find($id)->delete($id);

            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        }
        if ($idp == 2) {
            Proses::find($id)->delete($id);

            return response()->json([
                'success' => 'Record deleted successfully!'
            ]);
        }
    }
}
