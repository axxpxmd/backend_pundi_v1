<?php

namespace App\Http\Controllers\MasterArtikel;

use Auth;
use DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Sub_Kategori;

class TerverifikasiController extends Controller
{
    protected $route = 'master-artikel.artikel-terverifikasi.';
    protected $view  = 'pages.masterArtikel.terverifikasi.';
    protected $title = 'Artikel Terverifikasi';
    protected $path  = 'public_html/storage/images/artikel/';

    public function index()
    {
        $route = $this->route;
        $title = $this->title;

        $kategori = Kategori::select('id', 'n_kategori')->get();

        return view($this->view . 'index', compact(
            'route',
            'title',
            'kategori'
        ));
    }

    public function api(Request $request)
    {
        $artikel      = Artikel::wherestatus(1)->get();
        $kategori     = $request->kategori_id;
        $sub_kategori = $request->sub_kategori_id;

        if ($sub_kategori != 0) {
            $artikel = Artikel::wheresub_kategori_id($sub_kategori)->wherestatus(1)->get();
        } elseif ($kategori != 0) {
            $artikel = Artikel::wherekategori_id($kategori)->wherestatus(1)->get();
        }
        return DataTables::of($artikel)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Permission'><i class='icon-remove'></i></a>";
            })
            ->editColumn('judul', function ($p) {
                return "<a href='" . route($this->route . 'show', $p->id) . "' class='text-primary' title='Show Data'>" . $p->judul . "</a>";
            })
            ->editColumn('kategori_id', function ($p) {
                return $p->kategori->n_kategori;
            })
            ->rawColumns(['action', 'judul'])
            ->toJson();
    }

    public function subKegiatanByKegiatan($kategori_id)
    {
        return Sub_Kategori::select('id', 'n_sub_kategori')->wherekategori_id($kategori_id)->get();
    }

    public function show(Request $request, $id)
    {
        $route = $this->route;
        $title = $this->title;

        $artikel = Artikel::findOrFail($id);
        $editor  = Artikel::where('artikel.id', $id)->join('admin_details', 'artikel.editor_id', '=', 'admin_details.admin_id')
            ->select('admin_details.nama', 'admin_details.email')
            ->first();
        return view($this->view . 'show', compact(
            'route',
            'title',
            'artikel',
            'editor'
        ));
    }

    public function publishArtikel($id)
    {
        $publish = Artikel::findOrFail($id);
        $publish->update([
            'status' => 1,
            'editor_id' => Auth::user()->id
        ]);

        return redirect()
            ->route('master-artikel.artikel-terverifikasi.show', $id)
            ->withSuccess('Artikel Berhasil Terpublish !');
    }

    public function unpublishArtikel($id)
    {
        $unpublish = Artikel::findOrFail($id);
        $unpublish->update([
            'status' => 0,
            'editor_id' => Auth::user()->id
        ]);

        return redirect()
            ->route('master-artikel.artikel-terverifikasi.show', $id)
            ->withSuccess('Artikel Berhasil Ditarik Kembali !');
    }

    public function updateArtikel(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi'   => 'required|min:700'
        ]);

        $editor_id = Auth::user()->id;
        $judul     = $request->judul;
        $isi       = $request->isi;

        if ($request->gambar != null) {
            $request->validate([
                'gambar' => 'required|mimes:png,jpg,jpeg|max:2024'
            ]);

            $file     = $request->file('gambar');
            $fileName = time() . "." . $file->getClientOriginalName();
            $request->file('gambar')->storeAs($this->path, $fileName, 'ftp', 'public');

            // delete from storage
            $artikel = Artikel::find($id);
            $exist = $artikel->gambar;
            Storage::disk('ftp')->delete($this->path . $exist);

            $artikel->update([
                'judul'     => $judul,
                'gambar'    => $fileName,
                'isi'       => $isi,
                'editor_id' => $editor_id
            ]);
        } else {
            $artikel = Artikel::findOrFail($id);
            $artikel->update([
                'judul'     => $judul,
                'isi'       => $isi,
                'editor_id' => $editor_id
            ]);
        }

        return redirect()
            ->route('master-artikel.artikel-terverifikasi.show', $id)
            ->withSuccess('Selamat Artikel berhasil diperbaharui !');
    }
}
