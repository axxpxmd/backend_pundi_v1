<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $fillable =  ['id', 'confirm_id', 'nama', 'email', 'pertanyaan', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'];
}
