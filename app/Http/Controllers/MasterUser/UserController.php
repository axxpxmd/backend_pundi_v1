<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of welcome
 *
 * @author Asip Hamdi
 * Github : axxpxmd
 */

namespace App\Http\Controllers\MasterUser;

use DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\userPundi;

class UserController extends Controller
{
    protected $route = 'master-user.user.';
    protected $view  = 'pages.masteruser.';
    protected $title = 'Data User';
    protected $path  = 'public_html/storage/images/ava/';

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
        $user = userPundi::all();
        return DataTables::of($user)
            ->addColumn('action', function ($p) {
                return "<a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Permission'><i class='icon-remove'></i></a>";
            })
            ->editColumn('name', function ($p) {
                return "<a href='" . route($this->route . 'show', $p->id) . "' class='text-primary pull-right' title='Show Data'>" . $p->name . "</a>";
            })
            ->editColumn('photo',  function ($p) {
                if ($p->photo != null) {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block rounded-circle' alt='photo' src='" . config('app.ftp_src') . "/ava/" . $p->photo . "'>";
                } else {
                    return "<img width='50' class='rounded img-fluid mx-auto d-block' alt='photo' src='" . asset('images/boy.png') . "'>";
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'photo', 'name'])
            ->toJson();
    }

    public function show($id)
    {
        $route = $this->route;
        $title = $this->title;

        $userPundi = userPundi::findOrFail($id);

        return view($this->view . 'show', compact(
            'route',
            'title',
            'userPundi'
        ));
    }

    public function destroy($id)
    {
        $userPundi = userPundi::find($id);

        // delete photo from storage
        $exist = $userPundi->photo;
        Storage::disk('ftp')->delete($this->path . $exist);

        $userPundi->delete();

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }
}
