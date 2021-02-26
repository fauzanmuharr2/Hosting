<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;

class ProvinsiController extends Controller
{
    
    public function index()
    {
        
        $provinsi = Provinsi::latest()->get();
        $res = [
            'success' => true,
            'data'    => $provinsi,
            'message' => 'Data Provinsi Ditampilkan'
        ];

        return response()->json($res,200);

    }
   
    public function store(Request $request)
    {
        $provinsi = new Provinsi();
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();

        $res = [
            'success' => true,
            'data'    => $provinsi,
            'message' => 'data berhasil disimpan'
        ];
        return response()->json($res,200);
    }

 
    public function show($id)
    {
        $provinsi = Provinsi::whereId($id)->first();
        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Post!',
                'data'    => $provinsi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
        // $res = [
        //     'success'  => true,
        //     'data'     => $provinsi,
        //     'message'  => 'berhasil'
        // ];
        // return response()->json($res,200);
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'provinsi Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'provinsi Gagal Dihapus!',
            ], 500);
        }

    }
    }

