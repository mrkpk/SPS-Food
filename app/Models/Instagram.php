<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    protected $table = 'instagram';
    protected $primaryKey = 'id_ig';
    protected $fillable = ['id_ig', 'nama', 'foto', 'link', 'updated_at' . 'created_at'];
    protected $guarded = [];
    public $timestamp = false;
}
