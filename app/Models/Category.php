<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'cat_prod';
    protected $primaryKey = 'id_cat';
    protected $fillable = ['kategori', 'path', 'desk', 'updated_at', 'created_at'];
    protected $guarded = [];
    public $timestamp = false;
}
