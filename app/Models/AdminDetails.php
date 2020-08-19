<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model
use App\User;

class AdminDetails extends Model
{
    protected $table    = 'admin_details';
    protected $fillable = ['id', 'admin_id', 'nama', 'email', 'photo', 'no_telp'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
