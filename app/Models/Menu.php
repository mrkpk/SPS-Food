<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = ['id_menu', 'nama_menu', 'kategori', 'persiapan', 'durasi', 'porsi', 'gambar_path', 'video_path', 'best', 'id_pengirim', 'created_at', 'updated_at'];
    protected $guarded = [];
}
