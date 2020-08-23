<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Model
use App\User;

class Artikel extends Model
{
    protected $table    = 'artikel';
    protected $fillable = ['id', 'kategori_id', 'sub_kategori_id', 'penulis_id', 'editor_id', 'judul', 'gambar', 'isi', 'tag', 'artikel_view', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'];

    public function penulis()
    {
        return $this->belongsTo(userPundi::class, 'penulis_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
