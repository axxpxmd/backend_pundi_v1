<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model
use App\User;

class Komen extends Model
{
    protected $table    = 'comments';
    protected $fillable = ['id', 'artikel_id', 'user_id', 'nama', 'email', 'website', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
