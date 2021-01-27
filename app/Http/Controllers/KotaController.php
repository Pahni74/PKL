<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List Kota';
        $kota = Kota::all();
        $provinsi = Provinsi::all();
        return view("admin.kota.index", compact("kota",'title','provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        $provinsi = Provinsi::all();
        $title = "Tambah Data";
        return view('admin.kota.create', compact('title','kota','provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $kota = new Kota();
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->provinsi_id = $request->provinsi_id;
        $kota->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
        }
        return redirect()->route('kota.index');
        // $kota = new Kota();
        // $kota->kode_kota = $request->kode_kota;
        // $kota->nama_kota = $request->nama_kota;
        // $kota->provinsi_id = $request->provinsi_id;
        // $kota->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Kota';
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('admin.kota.show',compact('kota','title','provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $kota = Kota::findOrFail($id);
        $provinsi = Provinsi::all();
        return view('admin.kota.edit',compact('kota','title','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $kota = Kota::findOrFail($id);
            $kota->kode_kota = $request->kode_kota;
            $kota->nama_kota = $request->nama_kota;
            $kota->provinsi_id = $request->provinsi_id;
            $kota->save();
            \Session::flash('sukses','Data Berhasil Di Update');
            }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
            }
            return redirect()->route('kota.index');
        // $kota = Kota::findOrFail($id);
        // $kota->kode_kota = $request->kode_kota;
        // $kota->nama_kota = $request->nama_kota;
        // $kota->provinsi_id = $request->provinsi_id;
        // $kota->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $kota = Kota::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("kota.index");
        // $kota = kota::findOrFail($id)->delete();
        // return redirect()->route('kota.index')->with('sukses','Data Berhasil Di Hapus');
    }
}
