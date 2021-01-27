<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List Kecamatan';
        $kecamatan = Kecamatan::all();
        $kota = Kota::all();
        return view("admin.kecamatan.index", compact("kecamatan",'title','kota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        $kota = Kota::all();
        $title = "Tambah Data";
        return view('admin.kecamatan.create', compact('title','kecamatan','kota'));
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
        $kecamatan = new Kecamatan();
        $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->kota_id = $request->kota_id;
        $kecamatan->save();
                    \Session::flash('sukses','Data Berhasil Di Tambah');
                }catch(\Exception $e){
                    \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
                }
                return redirect()->route('kecamatan.index');
        // $kecamatan = new Kecamatan();
        // $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        // $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        // $kecamatan->kota_id = $request->kota_id;
        // $kecamatan->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Kecamatan';
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::all();
        return view('admin.kecamatan.show',compact('kecamatan','title','kota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $kecamatan = Kecamatan::findOrFail($id);
        $kota = Kota::all();
        return view('admin.kecamatan.edit',compact('kecamatan','title','kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $kecamatan = Kecamatan::findOrFail($id);
            $kecamatan->kode_kecamatan = $request->kode_kecamatan;
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;
            $kecamatan->kota_id = $request->kota_id;
            $kecamatan->save();
            \Session::flash('sukses','Data Berhasil Di Update');
            }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
            }
            return redirect()->route('kecamatan.index');
        // $kecamatan = Kecamatan::findOrFail($id);
        // $kecamatan->kode_kecamatan = $request->kode_kecamatan;
        // $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        // $kecamatan->kota_id = $request->kota_id;
        // $kecamatan->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $kecamatan = Kecamatan::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("kecamatan.index");
        // $kecamatan = kecamatan::findOrFail($id)->delete();
        // return redirect()->route('kecamatan.index')->with('sukses','Data Berhasil Di Hapus');
    }
}
