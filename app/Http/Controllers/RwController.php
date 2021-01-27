<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'List Rw';
        $rw = Rw::all();
        $kelurahan = Kelurahan::all();
        return view("admin.rw.index", compact("rw",'title','kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = Rw::all();
        $kelurahan = Kelurahan::all();
        $title = "Tambah Data";
        return view('admin.rw.create', compact('title','rw','kelurahan'));
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
        $rw = new Rw();
        $rw->kode_rw = $request->kode_rw;
        $rw->nama_rw = $request->nama_rw;
        $rw->kelurahan_id = $request->kelurahan_id;
        $rw->save();
                    \Session::flash('sukses','Data Berhasil Di Tambah');
                }catch(\Exception $e){
                    \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
                }
                return redirect()->route('rw.index');
        // $rw = new Rw();
        // $rw->kode_rw = $request->kode_rw;
        // $rw->nama_rw = $request->nama_rw;
        // $rw->kelurahan_id = $request->kelurahan_id;
        // $rw->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Rw';
        $rw = Rw::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view('admin.rw.show',compact('rw','title','kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $rw = Rw::findOrFail($id);
        $kelurahan = Kelurahan::all();
        return view('admin.rw.edit',compact('rw','title','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
        $rw = Rw::findOrFail($id);
        $rw->kode_rw = $request->kode_rw;
        $rw->nama_rw = $request->nama_rw;
        $rw->kelurahan_id = $request->kelurahan_id;
        $rw->save();
            \Session::flash('sukses','Data Berhasil Di Update');
            }catch(\Exception $e){
            \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
            }
            return redirect()->route('rw.index');
        // $rw = Rw::findOrFail($id);
        // $rw->kode_rw = $request->kode_rw;
        // $rw->nama_rw = $request->nama_rw;
        // $rw->kelurahan_id = $request->kelurahan_id;
        // $rw->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $rw = Rw::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("rw.index");
        // $rw = rw::findOrFail($id)->delete();
        // return redirect()->route('rw.index')->with('sukses','Data Berhasil Di Hapus');
    }
}
