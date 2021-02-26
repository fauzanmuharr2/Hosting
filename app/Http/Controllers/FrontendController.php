<?php

namespace App\Http\Controllers;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kasusid;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $positif = DB::table('rws')->select('kasusids.jumlah_positif','kasusids.jumlah_sembuh','kasusids.jumlah_meninggal')
        ->join('kasusids','rws.id','=','kasusids.id_rw')
        ->sum('kasusids.jumlah_positif');
        $meninggal = DB::table('rws')->select('kasusids.jumlah_positif','kasusids.jumlah_sembuh','kasusids.jumlah_meninggal')
        ->join('kasusids','rws.id','=','kasusids.id_rw')
        ->sum('kasusids.jumlah_meninggal');
        $sembuh = DB::table('rws')->select('kasusids.jumlah_positif','kasusids.jumlah_sembuh','kasusids.jumlah_meninggal')
        ->join('kasusids','rws.id','=','kasusids.id_rw')
        ->sum('kasusids.jumlah_sembuh');

        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasusids','kasusids.id_rw','rws.id')
        ->select('nama_provinsi',
                DB::raw('sum(kasusids.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasusids.jumlah_meninggal) as jumlah_meninggal'),
                DB::raw('sum(kasusids.jumlah_sembuh) as jumlah_sembuh'))
                ->groupBy('nama_provinsi')
                ->get();

        $global = file_get_contents('https://api.kawalcorona.com/');
        $dataglobal = json_decode($global, TRUE);

        $global = file_get_contents('https://api.kawalcorona.com/positif');
                $getglobal = json_decode($global, TRUE);

        $global = file_get_contents('https://api.kawalcorona.com/sembuh');
                $semglobal = json_decode($global, TRUE);

        $global = file_get_contents('https://api.kawalcorona.com/meninggal');
                $meglobal = json_decode($global, TRUE);

            return view('frontend', compact('positif','meninggal','sembuh','tampil','dataglobal','getglobal','semglobal','meglobal'));
    }
}
