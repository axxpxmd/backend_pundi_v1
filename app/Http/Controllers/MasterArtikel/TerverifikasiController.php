<?php

namespace App\Http\Controllers\MasterArtikel;

use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Artikel;

class TerverifikasiController extends Controller
{
    protected $route = 'master-artikel.artikel-terverifikasi.';
    protected $view  = 'pages.masterArtikel.terverifikasi.';
    protected $title = 'Artikel Terverifikasi';
    protected $path  = '';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;

        return view($this->view . 'index', compact(
            'route',
            'title'
        ));
    }

    public function api()
    {
        $artikel = Artikel::all();
        return DataTables::of($artikel)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Permission'><i class='icon-remove'></i></a>";
            })
            ->rawColumns(['action'])
            ->toJson();
    }
}
