<?php

namespace App\Http\Controllers;
use App\Models\Provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index',compact('provinsi'));
    }

    
    public function create()
    {
        return view('provinsi.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'kode_provinsi' => 'required|int|unique:provinsis',
            'nama_provinsi' => 'required|unique:provinsis',
        ],[
            'kode_provinsi.required' => 'Kode is required',
            'nama_provinsi.required' => 'Provinsi required'
        ]);

        $provinsi = new Provinsi;
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index');
    }

    
    public function show($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.show',compact('provinsi'));
    }

    
    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit', compact('provinsi'));
    }

    
    public function update(Request $request,$id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index',compact('provinsi'))->with('');
    }

    
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with(['message' => 'Data Provinsi Berhasil dihapus']);
    }
}
