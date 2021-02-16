<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;
use App\Models\Tracking;
use DB;
use Carbon\Carbon;
class FrontendController extends Controller
{
    public function index()
    {

        $provinsi = DB::table('provinsis') ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.provinsi_id')
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('provinsis.id')->orderBy('nama_provinsi','ASC')
        ->get();

        //  DATA Table trackings
        $jumlah_positif = DB::table('trackings')->sum('trackings.jumlah_positif');
        $jumlah_sembuh = DB::table('trackings')->sum('trackings.jumlah_sembuh');
        $jumlah_meninggal = DB::table('trackings')->sum('trackings.jumlah_meninggal');


        //  DATA API KAWALCORONA
            $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
            $positif = json_decode($datapositif, TRUE);
            $datasembuh = file_get_contents("https://api.kawalcorona.com/sembuh");
            $sembuh = json_decode($datasembuh, TRUE);
            $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
            $meninggal = json_decode($datameninggal, TRUE);
            $dataid = file_get_contents("https://api.kawalcorona.com/indonesia");
            $id = json_decode($dataid, TRUE);
            $dataidprovinsi = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");
            $idprovinsi = json_decode($dataidprovinsi, TRUE);

            //  TABLE GLOBAL
            $datadunia= file_get_contents("https://api.kawalcorona.com/");
            $dunia = json_decode($datadunia, TRUE);
            // TANGGAL
            $tanggal = Carbon::now()->format('D d-M-Y h:i:s');

            // CHART

            $chartSembuh = Tracking::select(
                        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'))
                        ->orderBy('trackings.tanggal')
                        ->groupBy('trackings.tanggal')
                        ->pluck('sembuh');

            $chartpositif = Tracking::select(DB::raw("COUNT(*) as count"))
                            ->whereYear('tanggal',date('Y'))
                            ->groupBy(DB::raw("Month(tanggal)"))
                            ->pluck('count');

            $months = Tracking::select(DB::raw("Month(tanggal) as month"))
                      ->whereYear('tanggal',date('Y'))
                      ->groupBy(DB::raw("Month(tanggal)"))
                      ->pluck('month');

                      $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
                      foreach($months as $index => $month)
                      {
                          $datas[$month] = $chartpositif[$index];
                      }

            return view('frontend.index', compact('chartSembuh','datas','provinsi','jumlah_positif','jumlah_sembuh','jumlah_meninggal','positif','sembuh','meninggal','tanggal','dunia'));
        }
        public function api()
        {
            return view('frontend.api');

    }
}
