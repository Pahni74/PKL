<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Provinsi;
use App\Models\Tracking;
class ApiController extends Controller
{

    public function provinsi(){
        $provinsi = DB::table('provinsis')->select('provinsis.kode_provinsi','provinsis.nama_provinsi', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.provinsi_id')
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('provinsis.id','tanggal')
        ->get();
        $jumlah_positif = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_positif');
            $jumlah_reaktif = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_reaktif');
            $jumlah_sembuh = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_sembuh');
            $jumlah_meninggal = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $provinsi
                        ],
            'Total' =>[
                        'Jumlah Reaktif' => $jumlah_reaktif,
                        'Jumlah Positif' => $jumlah_positif,
                        'Jumlah Sembuh' => $jumlah_sembuh,
                        'Jumlah Meninggal' => $jumlah_meninggal,
                    ],
        ]);
        // $data = [
        //     'status' => 200,
        //     'data' => $provinsi,
        //     'message' => 'Berhasil'
        // ];
        // return response()->json($data);
    }

    public function rw(){
        $provinsi = DB::table('trackings')->select('provinsis.nama_provinsi')->
        join('provinsis','trackings.id','=','provinsis.trackings_id')->get('trackings.nama_provisi');
        $rw = DB::table('trackings')->select([
                DB::raw('SUM(jumlah_reaktif) as Reaktif'),
                DB::raw('SUM(jumlah_positif) as Positif'),
                DB::raw('SUM(jumlah_sembuh) as Sembuh'),
                DB::raw('SUM(jumlah_meninggal) as Meninggal'),
        ])->groupBy('tanggal')->get();
            $jumlah_positif = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_positif');
            $jumlah_reaktif = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_reaktif');
            $jumlah_sembuh = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_sembuh');
            $jumlah_meninggal = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_meninggal');
            return response([
                'success' => true,
                'data' => [
                            'Hari Ini' => $rw
                            ],
                'Total' =>[ 'Jumlah Reaktif' => $jumlah_reaktif,
                            'Jumlah Positif' => $jumlah_positif,
                            'Jumlah Sembuh' => $jumlah_sembuh,
                            'Jumlah Meninggal' => $jumlah_meninggal,
                        ],
            ]);
    }
}
