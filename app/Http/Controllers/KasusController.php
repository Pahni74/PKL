<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Negara;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List Kasus Negara';
        $kasus = Kasus::all();
        $negara = Negara::all();
        return view("admin.kasus.index", compact("kasus",'title','negara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kasus = Kasus::all();
        $negara = Negara::all();
        $title = "Tambah Data";
        return view('admin.kasus.create', compact('title','kasus','negara'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $kasus = Kasus::create($request->all());
        // $kasus->save();
        $kasus = new Kasus();
        $kasus->jumlah_positif = $request->jumlah_positif;
        $kasus->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->negara_id = $request->negara_id;
        $kasus->save();
        return redirect()->route('kasus.index')->with('sukses','Data Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Kasus';
        $kasus = Kasus::findOrFail($id);
        $negara = Negara::all();
        return view('admin.kasus.show',compact('kasus','title','negara'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $kasus = Kasus::findOrFail($id);
        $negara = Negara::all();
        return view('admin.kasus.edit',compact('kasus','title','negara'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->jumlah_positif = $request->jumlah_positif;
        $kasus->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus->tanggal = $request->tanggal;
        $kasus->negara_id = $request->negara_id;
        $kasus->save();
        return redirect()->route('kasus.index')->with('sukses','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $kasus = Kasus::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("kasus.index");
        // $kasus = kasus::findOrFail($id)->delete();
        // return redirect()->route('kasus.index')->with('sukses','Data Berhasil Di Hapus');
    }
}
