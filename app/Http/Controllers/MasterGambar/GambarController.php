<?php

namespace App\Http\Controllers\MasterGambar;

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
    protected $path  = '/images/';

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
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . config('app.ftp_src') . $this->path . $p->header . "'>";
                } else {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . asset('images/boy.png') . "'>";
                }
            })
            ->editColumn('footer',  function ($p) {
                if ($p->footer != null) {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . config('app.ftp_src') .  $this->path . $p->footer . "'>";
                } else {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . asset('images/boy.png') . "'>";
                }
            })
            ->editColumn('poster',  function ($p) {
                if ($p->poster != null) {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . config('app.ftp_src') .  $this->path . $p->poster . "'>";
                } else {
                    return "<img width='80' class='img-fluid mx-auto d-block' alt='photo' src='" . asset('images/boy.png') . "'>";
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'header', 'footer', 'poster'])
            ->toJson();
    }

    public function store()
    {
        return response()->json([
            'message' => 'Tidak bisa menambah data!'
        ], 422);
    }

    public function edit($id)
    {
        $gambar = Gambar::find($id);

        return $gambar;
    }

    public function update(Request $request, $id)
    {
        $header = $request->header;
        $footer = $request->footer;
        $poster = $request->poster;

        if ($header != null) {
            $request->validate([
                'header' => 'required|mimes:png,jpg,jpeg|max:2024'
            ]);

            $file     = $request->file('header');
            $fileName = time() . "." . $file->getClientOriginalName();
            $request->file('header')->storeAs($this->path, $fileName, 'ftp', 'public');

            $data  = Gambar::findOrFail($id);
            $exist = $data->header;
            if ($exist != null) {
                Storage::disk('ftp')->delete($this->path . $exist);
            }

            $header = Gambar::findOrFail($id);
            $header->update([
                'header' => $fileName,
            ]);
        }

        if ($footer != null) {
            $request->validate([
                'footer' => 'required|mimes:png,jpg,jpeg|max:2024'
            ]);

            $file2     = $request->file('footer');
            $fileName2 = time() . "." . $file2->getClientOriginalName();
            $request->file('footer')->storeAs($this->path, $fileName2, 'ftp', 'public');

            $data2  = Gambar::findOrFail($id);
            $exist2 = $data2->footer;
            if ($exist2 != null) {
                Storage::disk('ftp')->delete($this->path . $exist2);
            }

            $gamber = Gambar::findOrFail($id);
            $gamber->update([
                'footer' => $fileName2,
            ]);
        }

        if ($poster != null) {
            $request->validate([
                'poster' => 'required|mimes:png,jpg,jpeg|max:2024'
            ]);

            $file2     = $request->file('poster');
            $fileName3 = time() . "." . $file2->getClientOriginalName();
            $request->file('poster')->storeAs($this->path, $fileName3, 'ftp', 'public');

            $data2  = Gambar::findOrFail($id);
            $exist2 = $data2->poster;
            if ($exist2 != null) {
                Storage::disk('ftp')->delete($this->path . $exist2);
            }

            $gambar = Gambar::findOrFail($id);
            $gambar->update([
                'poster' => $fileName3,
            ]);
        }

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil diperbaharui.'
        ]);
    }
}
