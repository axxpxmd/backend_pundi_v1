<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    protected $table    = 'gambar';
    protected $fillable = ['id', 'header', 'footer', 'poster', 'created_at', 'updated_at', 'created_by', 'updated_by'];
}
