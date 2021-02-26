<?php

namespace App\Http\Controllers;
use App\Controllers\DB;
use App\Models\Kota;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kecamatan = Kecamatan::with('kota')->get();
        return view('kecamatan.index', compact('kecamatan'));
    }
    public function create()
    {
        $kota = Kota::all();
        return view ('kecamatan.create', compact('kota'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kecamatan' => 'required|unique:kecamatans',
        ],[
            'nama_kecamatan.required' => 'Kecamatan required'
        ]);
        $kecamatan = new Kecamatan;
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['message' => 'Data kecamatan Berhasil disimpan']);
    }
    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('kecamatan.show', compact('kecamatan'));
    }
    public function edit($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::all();
        return view('kecamatan.edit', compact('kecamatan', 'kota'))->with(['message' => 'Data Kecamatan Berhasil diedit']);
    }
    public function update(Request $request, $id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['message' => 'Data kecamatan Berhasil disimpan']);
    }

    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with(['message' => 'Data Kecamatan Berhasil diHapus']);
    }
}
