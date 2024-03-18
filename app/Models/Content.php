<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'konten';
    protected $primaryKey = 'id_konten';
    protected $fillable = ['desc_cont', 'alamat1', 'alamat2', 'alamat3', 'no_hp1', 'no_hp2', 'no_hp3', 'email1', 'email2', 'email3', 'prim_about', 'sec_about', 'third_about'];
    protected $guarded = [];
    public $timestamp = false;
}