<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Controllers\DB;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
class KelurahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kelurahan = Kelurahan::with('kecamatan')->get();
        return view('kelurahan.index', compact('kelurahan'));
    }
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view ('kelurahan.create', compact('kecamatan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelurahan' => 'required|unique:kelurahans',
        ],[
            'nama_kelurahan.required' => 'kelurahan required'
        ]);
       $kelurahan = new Kelurahan;
       $kelurahan->id_kecamatan = $request->id_kecamatan;
       $kelurahan->nama_kelurahan = $request->nama_kelurahan;
       $kelurahan->save();
        return redirect()->route('kelurahan.index')->with(['message' => 'Data kelurahan Berhasil disimpan']);
    }
    public function show($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        return view('kelurahan.show', compact('kelurahan'));
    }
    public function edit($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('kelurahan.edit', compact('kelurahan', 'kecamatan'))->with(['message' => 'Data Kelurahan Berhasil diedit']);
    }
    public function update(Request $request, $id)
    {
       $kelurahan = Kelurahan::findOrFail($id);
       $kelurahan->id_kecamatan = $request->id_kecamatan;
       $kelurahan->kode_kelurahan = $request->kode_kelurahan;
       $kelurahan->nama_kelurahan = $request->nama_kelurahan;
       $kelurahan->save();
        return redirect()->route('kelurahan.index')->with(['message' => 'Data kelurahan Berhasil disimpan']);
    }

    public function destroy($id)
    {
        $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with(['message' => 'Data Kelurahan Berhasil diHapus']);
    }
}
