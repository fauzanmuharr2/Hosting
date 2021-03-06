<?php

namespace App\Http\Controllers;
use App\Controllers\DB;
use App\Models\Provinsi;
use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kota = Kota::with('provinsi')->get();
        return view('kota.index', compact('kota'));
    }
    public function create()
    {
       $provinsi = Provinsi::all();
       return view ('kota.create', compact('provinsi'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode_kota' => 'required|int|unique:kotas',
            'nama_kota' => 'required|unique:kotas',
        ],[
            'kode_kota.required' => 'Kode is required',
            'nama_kota.required' => 'kota required'
        ]);
        $kota = new Kota;
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')->with(['message' => 'Data Kota Berhasil disimpan']);
    }
    public function show($id)
    {
        $kota = Kota::findOrFail($id);
        return view('kota.show', compact('kota'));
    }
    public function edit($id)
    {
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('kota.edit', compact('kota', 'provinsi'))->with(['message' => 'Data Kota Berhasil diedit']);
    }
    public function update(Request $request, $id)
    {
        $kota = Kota::findOrFail($id);
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')->with(['message' => 'Data Kota Berhasil disimpan']);
    }

    public function destroy($id)
    {
        $kota = Kota::findOrFail($id);
        $kota->delete();
        return redirect()->route('kota.index')->with(['message' => 'Data Kota Berhasil diHapus']);
    }
}
