<?php

namespace App\Http\Controllers\MasterKonsultasi;

use Auth;
use DataTables;

use App\Http\Controllers\Controller;

// Models
use App\Models\AdminDetails;
use App\Models\Pertanyaan;

class PertanyaanController extends Controller
{
    protected $route = 'master-konsultasi.pertanyaan.';
    protected $view  = 'pages.masterKonsultasi.pertanyaan.';
    protected $title = 'Pertanyaan';

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
        $pertanyaan = Pertanyaan::all();
        return DataTables::of($pertanyaan)
            ->addColumn('action', function ($p) {
                return "<a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Permission'><i class='icon-remove'></i></a>";
            })
            ->editColumn('status', function ($p) {
                if ($p->status == 1) {
                    return 'Sudah dibaca';
                } else {
                    return 'Belum dibaca';
                }
            })
            ->editColumn('nama', function ($p) {
                return "<a href='" . route($this->route . 'show', $p->id) . "' class='text-primary' title='Show Data'>" . $p->nama . "</a>";
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'status', 'nama'])
            ->toJson();
    }

    public function show($id)
    {
        $route = $this->route;
        $title = $this->title;

        $confirm_id = Auth::user()->id;
        $pertanyaan = Pertanyaan::find($id);

        // confirm by
        $pertanyaan->update([
            'status'     => 1,
            'confirm_id' => $confirm_id
        ]);

        $confirm_by = AdminDetails::select('id', 'admin_id', 'nama', 'email')->where('admin_id', $pertanyaan->confirm_id)->first();

        return view($this->view . 'show', compact(
            'route',
            'title',
            'pertanyaan',
            'confirm_by'
        ));
    }

    public function destroy($id)
    {
        Pertanyaan::destroy($id);

        return response()->json([
            'message' => 'Data ' . $this->title . ' berhasil dihapus.'
        ]);
    }
}
