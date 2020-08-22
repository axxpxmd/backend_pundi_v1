<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $table    = 'konsultasi';
    protected $fillable = ['id', 'confirm_id', 'nama', 'email', 'konsultasi', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'];
}
