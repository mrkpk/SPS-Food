<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $table = 'bahan';
    protected $primaryKey = 'id_bahan';
    protected $fillable = ['id_bahan', 'bahan', 'ke', 'id_menu', 'created_at', 'updated_at'];
}
