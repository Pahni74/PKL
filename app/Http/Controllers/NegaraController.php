<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $title = 'List Negara';
        $negara = Negara::all();
        return view("admin.negara.index", compact("negara",'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Data";
        return view('admin.negara.create', compact('title'));
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
            $negara = new Negara();
            $negara->kode_negara = $request->kode_negara;
            $negara->nama_negara = $request->nama_negara;
            $negara->save();
                    \Session::flash('sukses','Data Berhasil Di Tambah');
                    }catch(\Exception $e){
                    \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
                    }
        // $negara = new Negara();
        // $negara->kode_negara = $request->kode_negara;
        // $negara->nama_negara = $request->nama_negara;
        // $negara->save();
        return redirect()->route('negara.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Negara';
        $negara = Negara::findOrFail($id);
        return view('admin.negara.show',compact('negara','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $negara = Negara::findOrFail($id);
        return view('admin.negara.edit',compact('negara','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $negara = Negara::findOrFail($id);
        $negara->kode_negara = $request->kode_negara;
        $negara->nama_negara = $request->nama_negara;
        $negara->save();
                    \Session::flash('sukses','Data Berhasil Di Update');
                    }catch(\Exception $e){
                    \Session::flash('gagal','Data Yang Anda Masukkan Sudah Ada');
                    }
                    return redirect()->route('negara.index');
        // $negara = Negara::findOrFail($id);
        // $negara->kode_negara = $request->kode_negara;
        // $negara->nama_negara = $request->nama_negara;
        // $negara->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negara  $negara
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $negara = Negara::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("negara.index");
        // $negara = Negara::findOrFail($id)->delete();
        // return redirect()->route('negara.index')->with('sukses','Data Berhasil Di Hapus');
    }

    public function api(){
        $negara = Negara::all();
        dd($negara);
    }
}
