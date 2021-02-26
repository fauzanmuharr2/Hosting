<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kasusid;
use App\Models\Provinsi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;



class ApiController extends Controller
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

        $res = [
            'success'           => true,
            'data'              => 'Data kasus indonesia',
            'jumlah_positif'    => $positif,
            'jumlah_meninggal'  => $meninggal,
            'jumlah_sembuh'     => $sembuh,
            'message'           => 'Data kasus ditampilkan'
        ];
        return response()->json($res,200);
    }

    public function provinsi($id)
    {
        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasusids','kasusids.id_rw','rws.id')
        ->where('provinsis.id', $id)
        ->select('nama_provinsi',
                DB::raw('sum(kasusids.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasusids.jumlah_meninggal) as jumlah_meninggal'),
                DB::raw('sum(kasusids.jumlah_sembuh) as jumlah_sembuh'))
                ->groupBy('nama_provinsi')
                ->get();
        $res = [
            'success'           => true,
            'data'              => 'Data kasus Provinsi',
            'Data Provinsi'    => $tampil,
            'message'           => 'Data kasus ditampilkan'
        ];
        return response()->json($res,200);
    }

    public function seluruhprovinsi()
    {
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
        $res = [
            'success'           => true,
            'data'              => 'Data kasus Provinsi',
            'Data Provinsi'    => $tampil,
            'message'           => 'Data kasus ditampilkan'
        ];
        return response()->json($res,200);
    }

    public function seluruhkota()
    {
        $tampil = DB::table('kotas')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasusids','kasusids.id_rw','rws.id')
        ->select('nama_kota',
                DB::raw('sum(kasusids.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasusids.jumlah_meninggal) as jumlah_meninggal'),
                DB::raw('sum(kasusids.jumlah_sembuh) as jumlah_sembuh'))
                ->groupBy('nama_kota')
                ->get();
        $res = [
            'success'           => true,
            'data'              => 'Data kasus kota',
            'Data Provinsi'    => $tampil,
            'message'           => 'Data kasus ditampilkan'
        ];
        return response()->json($res,200);
    }

    public function seluruhkecamatan()
    {
        $tampil = DB::table('kecamatans')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasusids','kasusids.id_rw','rws.id')
        ->select('nama_kecamatan',
                DB::raw('sum(kasusids.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasusids.jumlah_meninggal) as jumlah_meninggal'),
                DB::raw('sum(kasusids.jumlah_sembuh) as jumlah_sembuh'))
                ->groupBy('nama_kecamatan')
                ->get();
        $res = [
            'success'           => true,
            'data'              => 'Data kasus kecamatan',
            'Data Provinsi'    => $tampil,
            'message'           => 'Data kasus ditampilkan'
        ];
        return response()->json($res,200);
    }

    public function seluruhkelurahan()
    {
        $tampil = DB::table('kelurahans')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasusids','kasusids.id_rw','rws.id')
        ->select('nama_kelurahan',
                DB::raw('sum(kasusids.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasusids.jumlah_meninggal) as jumlah_meninggal'),
                DB::raw('sum(kasusids.jumlah_sembuh) as jumlah_sembuh'))
                ->groupBy('nama_kelurahan')
                ->get();
        $res = [
            'success'           => true,
            'data'              => 'Data kasus kelurahan',
            'Data Provinsi'    => $tampil,
            'message'           => 'Data kasus ditampilkan'
        ];
        return response()->json($res,200);
    }

    public function hari(){
        //Data Perhari
        $kasusid = Kasusid::get('created_at')->last();
        $jumlah_positif = Kasusid::where('tanggal', date('Y-m-d'))->sum('jumlah_positif');
        $jumlah_sembuh = Kasusid::where('tanggal', date('Y-m-d'))->sum('jumlah_sembuh');
        $jumlah_meninggal = Kasusid::where('tanggal', date('Y-m-d'))->sum('jumlah_meninggal');

        $join = DB::table('kasusids')
                    ->select('jumlah_positif', 'jumlah_sembuh', 'jumlah_meninggal')
                    ->join('rws' ,'Kasusids.id_rw', '=', 'rws.id')
                    ->get();
        $arr1 = [
            'jumlah_positif' =>$join->sum('jumlah_positif'),
            'jumlah_sembuh' =>$join->sum('jumlah_sembuh'),
            'jumlah_meninggal' =>$join->sum('jumlah_meninggal'),
        ];
        $arr2 = [
            'jumlah_positif' =>$jumlah_positif,
            'jumlah_sembuh' =>$jumlah_sembuh,
            'jumlah_meninggal' =>$jumlah_meninggal,
        ];
        $arr = [
            'status' => 200,
            'data' => [
                'Hari Ini' => $arr2,
                'Total Kasus Indonesi Hari Ini' => $arr1
            ],
            'message' => 'Berhasil'
        ];
        
        return response()->json($arr, 200);
    }

    public function global()
    {
    $globe = Http::get('https://api.kawalcorona.com/')->json();
    $dt = [];
    foreach ($globe as $key => $isi) {
        $isiarray = $isi['attributes'];
        $isidata = [
        'OBJECTID' => $isiarray['OBJECTID'],
        'Country_Region' => $isiarray['Country_Region'],
        'Confirmed' => $isiarray['Confirmed'],
        'Deaths' => $isiarray['Deaths'],
        'Recovered' => $isiarray['Recovered']
        ];
        array_push($dt , $isidata);
    }
    $hasil = [
        'success' => true,
        'data' => $dt,
        'message' => 'Success'
    ];
    return response()->json($hasil, 200);
    }

    public function indonesia()
    {
    $response = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
    return $response->json();
    }
    

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
