<?php

namespace App\Http\Controllers\MasterKomen;

use DataTables;

use App\Http\Controllers\Controller;

// Models
use App\Models\Komen;
use App\Models\userPundi;

class KomenController extends Controller
{
    protected $route = 'master-komen.komen.';
    protected $view  = 'pages.masterKomen.';
    protected $title = 'Komen';

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
        $komen = Komen::all();
        return DataTables::of($komen)
            ->addColumn('action', function ($p) {
                return "<a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Permission'><i class='icon-remove'></i></a>";
            })
            ->addColumn('user', function ($p) {
                if ($p->user_id != null) {
                    $user = userPundi::select('id', 'name', 'email')->where('id', $p->user_id)->first();
                    return "<a href='" . route($this->route . 'show', $p->id) . "' class='text-primary' title='Show Data'>" . $user->name . "</a>";
                } else {
                    return "<a href='" . route($this->route . 'show', $p->id) . "' class='text-primary' title='Show Data'>" . $p->nama . "</a>";
                }
            })
            ->addColumn('email', function ($p) {
                if ($p->user_id != null) {
                    $user = userPundi::select('id', 'name', 'email')->where('id', $p->user_id)->first();
                    return $user->email;
                } else {
                    return $p->email;
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'email', 'user'])
            ->toJson();
    }

    public function show($id)
    {
        $route = $this->route;
        $title = $this->title;

        $komen = Komen::find($id);
        $user  = userPundi::select('id', 'name', 'email')->where('id', $komen->user_id)->first();

        return view($this->view . 'show', compact(
            'route',
            'title',
            'komen',
            'user'
        ));
    }

    public function destroy($id)
    {
        Komen::destroy($id);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }
}
