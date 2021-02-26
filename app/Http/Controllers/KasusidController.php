<?php

namespace App\Http\Controllers;
use App\Controllers\DB;
use App\Models\Rw;
use App\Models\Kasusid;
use Illuminate\Http\Request;

class KasusidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kasusid = Kasusid::with('rw.kelurahan.kecamatan.kota.provinsi')->orderBy('id','DESC')->get();
        // dd($kasus);
        return view('kasusid.index',compact('kasusid'));
    }
    public function create()
    {
        $rw = Rw::all();
        return view ('kasusid.create', compact('rw'));
    }
    public function store(Request $request)
    {
        $kasusid = new Kasusid();
        $kasusid->id_rw = $request->id_rw;
        $kasusid->jumlah_positif = $request->jumlah_positif;
        $kasusid->jumlah_meninggal = $request->jumlah_meninggal;
        $kasusid->jumlah_sembuh = $request->jumlah_sembuh;
        $kasusid->tanggal = $request->tanggal;
        $kasusid->save();
        return redirect()->route('kasusid.index')->with(['message' => 'Data Kasusid Berhasil disimpan']);
    }
    public function show($id)
    {
        $kasusid = Kasusid::findOrFail($id);
        return view('kasusid.show', compact('kasusid'));
    }
    public function edit($id)
    {
        $kasusid = Kasusid::findOrFail($id);
        $rw = Rw::all();
        return view('kasusid.edit', compact('kasusid', 'rw'))->with(['message' => 'Data Kasusid Berhasil diedit']);
    }
    public function update(Request $request, $id)
    {
        $kasusid = Kasusid::findOrFail($id);
        $kasusid->id_rw = $request->id_rw;
        $kasusid->jumlah_positif = $request->jumlah_positif;
        $kasusid->jumlah_meninggal = $request->jumlah_meninggal;
        $kasusid->jumlah_sembuh = $request->jumlah_sembuh;
        $kasusid->tanggal = $request->tanggal;
        $kasusid->save();
        return redirect()->route('kasusid.index')->with(['message' => 'Data Kasusid Berhasil disimpan']);
    }

    public function destroy($id)
    {
        $kasusid = Kasusid::findOrFail($id);
        $kasusid->delete();
        return redirect()->route('kasusid.index')->with(['message' => 'Data Kasusid Berhasil diHapus']);
    }
}

