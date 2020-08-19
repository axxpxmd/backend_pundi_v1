<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userPundi extends Model
{
    protected $table    = 'users';
    protected $fillable = ['name', 'email', 'password', 'nama_depan', 'nama_belakang', 'username', 'photo', 'bio', 'nomor_hp', 'facebook', 'twitter', 'instagram'];
}
