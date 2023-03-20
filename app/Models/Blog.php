<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'id_blog';
    protected $fillable = ['id_blog', 'judul_blog', 'kategori', 'isi_blog', 'gambar_blog', 'video_blog', 'pengirim', 'created_at', 'updated_at'];
    protected $guarded = [];
}
