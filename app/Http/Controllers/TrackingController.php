<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use App\Models\Rw;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ='Tracking';
        $tracking = tracking::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
        return view('admin.tracking.index',compact('tracking','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data';
        return view('admin.tracking.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tracking = new Tracking;
        $tracking->jumlah_positif = $request->jumlah_positif;
        $tracking->jumlah_sembuh = $request->jumlah_sembuh;
        $tracking->jumlah_meninggal = $request->jumlah_meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->rw_id = $request->rw_id;
        $tracking ->save();
        return redirect()->route('tracking.index')->with('sukses','Data Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show(Tracking $tracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $tracking = Tracking::findOrFail($id);
        $rw = Rw::all();
        return view('admin.tracking.edit',compact('rw','title','tracking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->jumlah_positif = $request->jumlah_positif;
        $tracking->jumlah_sembuh = $request->jumlah_sembuh;
        $tracking->jumlah_meninggal = $request->jumlah_meninggal;
        $tracking->tanggal = $request->tanggal;
        $tracking->rw_id = $request->rw_id;
        $tracking ->save();
        return redirect()->route('rw.index')->with('sukses','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $tracking = Tracking::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("tracking.index");
    }
}
