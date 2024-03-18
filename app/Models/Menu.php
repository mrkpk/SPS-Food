<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $fillable = ['id_menu', 'nama_menu', 'kategori', 'persiapan', 'durasi', 'porsi', 'status', 'gambar_path', 'video_path', 'link', 'best', 'oleh', 'id_pengirim', 'created_at', 'updated_at'];
    protected $guarded = [];
}
