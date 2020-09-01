<?php

namespace App\Http\Controllers\MasterGambar;

use Auth;
use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Gambar;

class GambarController extends Controller
{
    protected $route = 'master-gambar.gambar.';
    protected $view  = 'pages.masterGambar.';
    protected $title = 'Gambar';
    protected $path  = 'images/';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;
        $path  = $this->path;

        return view($this->view . 'index', compact(
            'route',
            'title',
            'path'
        ));
    }

    public function api()
    {
        $gambar = Gambar::all();
        return DataTables::of($gambar)
            ->addColumn('action', function ($p) {
                return "<a  href='#' onclick='edit(" . $p->id . ")' title='Edit Permission'><i class='icon-pencil mr-1'></i></a>";
            })
            ->editColumn('header',  function ($p) {
                if ($p->header != null) {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . config('app.ftp_src') . $p->header . "'>";
                } else {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . asset('images/boy.png') . "'>";
                }
            })
            ->editColumn('footer',  function ($p) {
                if ($p->footer != null) {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . config('app.ftp_src') . $p->footer . "'>";
                } else {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . asset('images/boy.png') . "'>";
                }
            })
            ->editColumn('poster',  function ($p) {
                if ($p->poster != null) {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . config('app.ftp_src') . $p->poster . "'>";
                } else {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . asset('images/boy.png') . "'>";
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'header', 'footer', 'poster'])
            ->toJson();
    }
}
