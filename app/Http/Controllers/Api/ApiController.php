<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Provinsi;

class ApiController extends Controller
{

    public function provinsi(){
        $provinsi = Provinsi::all();
        $data = [
            'status' => 200,
            'data' => $provinsi,
            'message' => 'Berhasil'
        ];
        return response()->json($data);
    }

    public function rw(){
        $rw = DB::table('trackings')
        ->join('rws', 'rw_id', '=', 'rw_id')
        ->select('trackings.jumlah_reaktif','trackings.jumlah_positif','trackings.jumlah_sembuh','trackings.jumlah_meninggal')
        ->first();
        $data = [
            'succes' => true,
            'data' => $rw,
            'message' => 'Berhasil'
        ];
        return response()->json($data);
    }
}
