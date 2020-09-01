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

namespace App\Http\Controllers;

// Models
use App\Models\Artikel;
use App\Models\userPundi;
use App\Models\Konsultasi;
use App\Models\Pertanyaan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Count Kategori in artikel
        $artikel_headline   = Artikel::wherekategori_id(1)->count();
        $artikel_indepth    = Artikel::wherekategori_id(2)->count();
        $artikel_kebijakan  = Artikel::wherekategori_id(3)->count();
        $artikel_serbaserbi = Artikel::wherekategori_id(4)->count();
        $artikel_konsultasi = Artikel::wherekategori_id(5)->count();

        /**
         * Count artikel by kategori
         */
        $ulasan = Artikel::select('kategori_id')->where('kategori_id', 1)->count();
        $kajian = Artikel::select('kategori_id')->where('kategori_id', 2)->count();
        $kreativitas = Artikel::select('kategori_id')->where('kategori_id', 3)->count();
        $serbaserbi  = Artikel::select('kategori_id')->where('kategori_id', 4)->count();

        /**
         * Count User
         */
        $userPundi = userPundi::count();

        /**
         * Count konsultasi (konsultasi, pertanyaan)
         */
        $konsultasi = Konsultasi::count();
        $pertanyaan = Pertanyaan::count();

        /**
         * Count artikel
         */
        $countArtikel = Artikel::select('artikel_view')->sum('artikel_view');
        $listArtikel  = Artikel::select('id', 'judul', 'artikel_view', 'penulis_id')->orderBy('artikel_view', 'desc')->get()->take(10);

        /** 
         * Total artikel
         */
        $totalArtikel     = Artikel::count();
        $totalUserArtikel = DB::select('SELECT COUNT(judul) as total_artikel, name, SUM(artikel_view) as total_view, users.id as user_id FROM artikel JOIN users on artikel.penulis_id = users.id GROUP BY name,user_id ORDER BY total_artikel DESC LIMIT 10');

        return view('home', compact(
            'ulasan',
            'kajian',
            'kreativitas',
            'serbaserbi',
            'userPundi',
            'konsultasi',
            'pertanyaan',
            'countArtikel',
            'listArtikel',
            'totalArtikel',
            'totalUserArtikel',
            'artikel_headline',
            'artikel_indepth',
            'artikel_kebijakan',
            'artikel_serbaserbi',
            'artikel_konsultasi'
        ));
    }
}
