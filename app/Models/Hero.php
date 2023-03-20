<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = 'hero';
    protected $primaryKey = 'id_modal';
    protected $fillable = ['id_hero', 'nama', 'deskripsi', 'gambar', 'updated_at', 'created_at'];
    protected $guarded = [];
    public $timestamp = false;
}
