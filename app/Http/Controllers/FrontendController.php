<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Tracking;
use App\Charts\CovidChart;
use DB;
use Carbon\Carbon;
class FrontendController extends Controller
{
    public function index()
    {
        $title = "Tracking Covid";
         $provinsi = DB::table('provinsis')
            ->select('provinsis.id', 'provinsis.nama_provinsi', 'provinsis.kode_provinsi',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
            ->join('kotas','provinsis.id','=','kotas.provinsi_id')
            ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
            ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
            ->join('rws','kelurahans.id','=','rws.kelurahan_id')
            ->join('trackings','rws.id','=','trackings.rw_id')
            ->groupBy('provinsis.id')
            ->get();
        // $provinsi = DB::table('provinsis') ->select('provinsis.kode_provinsi','provinsis.nama_provinsi',
        // DB::raw('SUM(trackings.jumlah_positif) as positif'),
        // DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        // DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        // ->join('kotas','provinsis.id','=','kotas.provinsi_id')
        // ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        // ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        // ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        // ->join('trackings','rws.id','=','trackings.rw_id')
        // ->groupBy('provinsis.id')->orderBy('nama_provinsi','ASC')
        // ->get();

        //  DATA Table trackings
        $case_positif = DB::table('trackings')->sum('trackings.jumlah_positif');
        $case_sembuh = DB::table('trackings')->sum('trackings.jumlah_sembuh');
        $case_meninggal = DB::table('trackings')->sum('trackings.jumlah_meninggal');


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
            $tkposi = Tracking::orderBy('tanggal')->pluck('jumlah_positif','tanggal');
            $tksembuh = Tracking::orderBy('tanggal')->pluck('jumlah_sembuh','tanggal');
            $tkmeninggal = Tracking::orderBy('tanggal')->pluck('jumlah_meninggal','tanggal');

            $chart = new CovidChart;
            $chart->labels($tkposi->keys());
            $chart->dataset('Positif', 'bar',$tkposi->values())->backgroundColor('orange');
            $chart->dataset('Sembuh', 'bar',$tksembuh->values())->backgroundColor('green');
            $chart->dataset('Meninggal', 'bar',$tkmeninggal->values())->backgroundColor('red');

            return view('frontend.index', compact('title','chart','provinsi','case_positif','case_sembuh','case_meninggal','positif','sembuh','meninggal','tanggal','dunia'));
    }
    public function api()
    {
        $title = "Tracking Covid Api";
        return view('frontend.pageapi', compact('title'));
    }
    public function getKotaProvinsi($id)
    {

        $jumlah_positif = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
            ->join('provinsis', 'provinsis.id', '=', 'kotas.provinsi_id')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.kota_id')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id')
            ->join('rws', 'kelurahans.id', '=', 'rws.kelurahan_id')
            ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
            ->where('provinsis.id', $id)
            ->groupBy('kotas.id')
            ->sum('trackings.jumlah_positif');

        $jumlah_sembuh = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
            ->join('provinsis', 'provinsis.id', '=', 'kotas.provinsi_id')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.kota_id')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id')
            ->join('rws', 'kelurahans.id', '=', 'rws.kelurahan_id')
            ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
            ->where('provinsis.id', $id)
            ->groupBy('kotas.id')
            ->sum('trackings.jumlah_sembuh');

        $jumlah_meninggal = DB::table('kotas')
            ->select('kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
            ->join('provinsis', 'provinsis.id', '=', 'kotas.provinsi_id')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.kota_id')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id')
            ->join('rws', 'kelurahans.id', '=', 'rws.kelurahan_id')
            ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
            ->where('provinsis.id', $id)
            ->groupBy('kotas.id')
            ->sum('trackings.jumlah_meninggal');

        $datas = DB::table('kotas')
            ->select('kotas.id', 'kotas.nama_kota', 'kotas.kode_kota',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
            ->join('provinsis', 'provinsis.id', '=', 'kotas.provinsi_id')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.kota_id')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id')
            ->join('rws', 'kelurahans.id', '=', 'rws.kelurahan_id')
            ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
            ->where('provinsis.id', $id)
            ->groupBy('kotas.id')
            ->get();
        // dd($jumlah_positif);
        $provinsis = Provinsi::findOrFail($id);
        return view('frontend.singleProvinsi', compact('datas', 'jumlah_sembuh', 'jumlah_meninggal', 'jumlah_positif', 'provinsis'));
    }

    public function getKecamatanKota($id)
    {

        $jumlah_positif = DB::table('kecamatans')
            ->select('kecamatans.nama_kecamatan',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
            ->join('kotas', 'kotas.id', '=', 'kecamatans.kota_id')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id')
            ->join('rws', 'kelurahans.id', '=', 'rws.kelurahan_id')
            ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
            ->where('kotas.id', $id)
            ->groupBy('kecamatans.id')
            ->sum('trackings.jumlah_positif');

        $jumlah_sembuh = DB::table('kotas')
            ->select('kecamatans.nama_kecamatan',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
        // ->join('provinsis','provinsis.id','=','kotas.provinsi_id')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.kota_id')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id')
            ->join('rws', 'kelurahans.id', '=', 'rws.kelurahan_id')
            ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
            ->where('kotas.id', $id)
            ->groupBy('kecamatans.id')
            ->sum('trackings.jumlah_sembuh');

        $jumlah_meninggal = DB::table('kotas')
            ->select('kecamatans.nama_kecamatan',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
        // ->join('provinsis','provinsis.id','=','kotas.provinsi_id')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.kota_id')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id')
            ->join('rws', 'kelurahans.id', '=', 'rws.kelurahan_id')
            ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
            ->where('kotas.id', $id)
            ->groupBy('kecamatans.id')
            ->sum('trackings.jumlah_meninggal');

        $datas = DB::table('kecamatans')
            ->select('kecamatans.nama_kecamatan',
                DB::raw('sum(trackings.jumlah_positif) as positif'),
                DB::raw('sum(trackings.jumlah_sembuh) as sembuh'),
                DB::raw('sum(trackings.jumlah_meninggal) as meninggal'))
            ->join('kotas', 'kotas.id', '=', 'kecamatans.kota_id')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.kecamatan_id')
            ->join('rws', 'kelurahans.id', '=', 'rws.kelurahan_id')
            ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
            ->where('kotas.id', $id)
            ->groupBy('kecamatans.id')
            ->get();
        // dd($jumlah_positif);
        $kotas = Kota::findOrFail($id);
        return view('singleKota', compact('datas', 'jumlah_sembuh', 'jumlah_meninggal', 'jumlah_positif', 'kotas'));
    }
}
