<?php

namespace App\Http\Controllers;

use App\Models\Kasus2;
use App\Models\rw;
use Illuminate\Http\Request;

class Kasus2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List Kasus Rw';
        $kasus2 = Kasus2::all();
        $rw = Rw::all();
        return view("admin.kasus2.index", compact("kasus2",'title','rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kasus2 = kasus2::all();
        $rw = rw::all();
        $title = "Tambah Data";
        return view('admin.kasus2.create', compact('title','kasus2','rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasus2 = new Kasus2();
        $kasus2->jumlah_positif = $request->jumlah_positif;
        $kasus2->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus2->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->rw_id = $request->rw_id;
        $kasus2->save();
        return redirect()->route('kasus2.index')->with('sukses','Data Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Kasus';
        $kasus2 = Kasus2::findOrFail($id);
        $rw = rw::all();
        return view('admin.kasus2.show',compact('kasus2','title','rw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $kasus2 = Kasus2::findOrFail($id);
        $rw = rw::all();
        return view('admin.kasus2.edit',compact('kasus2','title','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kasus2 = Kasus2::findOrFail($id);
        $kasus2->jumlah_positif = $request->jumlah_positif;
        $kasus2->jumlah_sembuh = $request->jumlah_sembuh;
        $kasus2->jumlah_meninggal = $request->jumlah_meninggal;
        $kasus2->tanggal = $request->tanggal;
        $kasus2->rw_id = $request->rw_id;
        $kasus2->save();
        return redirect()->route('kasus2.index')->with('sukses','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasus2  $kasus2
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $kasus2 = Kasus2::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("kasus2.index");
        // $kasus2 = kasus2::findOrFail($id)->delete();
        // return redirect()->route('kasus2.index')->with('sukses','Data Berhasil Di Hapus');
    }
}
