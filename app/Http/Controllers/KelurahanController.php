<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List Kelurahan';
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        return view('admin.kelurahan.index', compact('title','kecamatan','kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = Kelurahan::all();
        $kecamatan = Kecamatan::all();
        $title = "Tambah Data";
        return view('admin.kelurahan.create', compact('title','kelurahan','kecamatan'));
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
        $kelurahan = new Kelurahan();
        $kelurahan->kode_kelurahan = $request->kode_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->kecamatan_id = $request->kecamatan_id;
        $kelurahan->save();
                \Session::flash('sukses','Data Berhasil Di Tambah');
            }catch(\Exception $e){
                \Session::flash('gagal',$e->getMessage());
            }
            return redirect()->route('kelurahan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Kelurahan';
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.show',compact('kelurahan','title','kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $kelurahan = Kelurahan::findOrFail($id);
        $kecamatan = Kecamatan::all();
        return view('admin.kelurahan.edit',compact('kelurahan','title','kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $kelurahan = Kelurahan::findOrFail($id);
        $kelurahan->kode_kelurahan = $request->kode_kelurahan;
        $kelurahan->nama_kelurahan = $request->nama_kelurahan;
        $kelurahan->kecamatan_id = $request->kecamatan_id;
        $kelurahan->save();
            \Session::flash('sukses','Data Berhasil Di Update');
            }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
            }
            return redirect()->route('kelurahan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $kelurahan = Kelurahan::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("kelurahan.index");

    }
}
