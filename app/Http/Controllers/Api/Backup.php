<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Provinsi;
use App\Models\Tracking;
use App\Models\Negara;
use Carbon\Carbon;
class ApiController extends Controller
{
    public function global()
    {
        $client = new Client();
        $url = "https://api.kawalkorona.com";
        $response = $client->request('GET',$url.[
            'verify' => false
        ]);

        $responseBody = json_encode($response->getBody()->getContents());
        $response = $client->request('GET',$url->$responseBody('attributes'),[
            'verify' => false
        ]);
        dd($response);
        $this->data=[
            'name' => ''
        ];
    }

    public function provinsi(){
        $allDay = DB::table('provinsis')->select('provinsis.kode_provinsi','provinsis.nama_provinsi', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.provinsi_id')
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('provinsis.id')
        ->get();
        $today = DB::table('provinsis')->select('provinsis.kode_provinsi','provinsis.nama_provinsi', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.provinsi_id')
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->where('tanggal',Carbon::today())
        ->groupBy('provinsis.id')
        ->get();
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' =>$today
                        ],
            'Total' =>[
                        $allDay
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
        $rw = DB::table('trackings')->select([
                DB::raw('SUM(jumlah_positif) as Positif'),
                DB::raw('SUM(jumlah_sembuh) as Sembuh'),
                DB::raw('SUM(jumlah_meninggal) as Meninggal'),
        ])->where('tanggal',Carbon::today())
        ->groupBy('trackings.id')->get();
            $jumlah_positif = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_positif');
            $jumlah_sembuh = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_sembuh');
            $jumlah_meninggal = DB::table('rws')->select('trackings.jumlah_positif','trackings.jumlah_reaktif'.'trackings.jumlah_sembuh','trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_meninggal');
            return response([
                'success' => true,
                'data' => [
                            'Hari Ini' => $rw
                            ],
                'Total' =>[
                            'Jumlah Positif' => $jumlah_positif,
                            'Jumlah Sembuh' => $jumlah_sembuh,
                            'Jumlah Meninggal' => $jumlah_meninggal,
                        ],
            ]);
    }

    public function negara()
    {
        $negara = DB::table('negaras')->select('negaras.nama_negara', DB::raw('SUM(kasuses.jumlah_positif) as positif'),
        DB::raw('SUM(kasuses.jumlah_sembuh) as sembuh'),DB::raw('SUM(kasuses.jumlah_meninggal) as meninggal'))
        ->join('kasuses','negaras.id','=','kasuses.negara_id')
        ->groupBy('negaras.id')
        ->get();
        $jumlah_positif = DB::table('negaras')
        ->join('kasuses','negaras.id','=','kasuses.negara_id')
        ->select('kasuses.jumlah_positif')
        ->sum('kasuses.jumlah_positif');
        $jumlah_sembuh = DB::table('negaras')
        ->join('kasuses','negaras.id','=','kasuses.negara_id')
        ->select('kasuses.jumlah_sembuh')
        ->sum('kasuses.jumlah_sembuh');
        $jumlah_meninggal = DB::table('negaras')
        ->join('kasuses','negaras.id','=','kasuses.negara_id')
        ->select('kasuses.jumlah_meninggal')
        ->sum('kasuses.jumlah_meninggal');
      $data = [
            'status' => 200,
            'data' => $negara,
            'message' => 'Berhasil'
        ];
        return response()->json($data);

    }

    public function positif()
    {
        $jumlah_positif = DB::table('trackings')
        ->select('trackings.jumlah_positif')
        ->sum('trackings.jumlah_positif');
        return response([
            'success' => true,
            'data' => [
                        'Name' => 'Jumlah Positif',
                        'Value' => $jumlah_positif
                        ],
        ]);

    }
    public function sembuh()
    {
        $jumlah_sembuh = DB::table('trackings')
        ->select('trackings.jumlah_sembuh')
        ->sum('trackings.jumlah_sembuh');
        return response([
            'success' => true,
            'data' => [
                        'Name' => 'Jumlah Sembuh',
                        'Value' => $jumlah_sembuh
                        ],
        ]);

    }
    public function meninggal()
    {
        $jumlah_meninggal = DB::table('trackings')
        ->select('trackings.jumlah_meninggal')
        ->sum('trackings.jumlah_meninggal');
        return response([
            'success' => true,
            'data' => [
                        'Name' => 'Jumlah Meninggal',
                        'Value' => $jumlah_meninggal
                        ],
        ]);

    }

}
