<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    protected $table = 'proses';
    protected $primaryKey = 'id_proses';
    protected $fillable = ['id_proses', 'proses', 'tahap', 'id_menu', 'created_at', 'updated_at'];
}
