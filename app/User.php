<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table    = 'admins';
    protected $fillable = ['id', 'username', 'email', 'password'];
    protected $hidden   = ['remember_token'];
    protected $casts    = ['email_verified_at' => 'datetime'];
}
