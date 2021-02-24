<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Charts\CovidChart;
use App\Models\Tracking;
use DB;
class DashboardController extends Controller
{
    public function index(Request $request){
        $title ='Dashboard';
        $jumlah_positif = DB::table('trackings')->sum('trackings.jumlah_positif');
        $jumlah_sembuh = DB::table('trackings')->sum('trackings.jumlah_sembuh');
        $jumlah_meninggal = DB::table('trackings')->sum('trackings.jumlah_meninggal');

       // CHART
       $tkposi = Tracking::orderBy('tanggal')->pluck('jumlah_positif','tanggal');
       $tksembuh = Tracking::orderBy('tanggal')->pluck('jumlah_sembuh','tanggal');
       $tkmeninggal = Tracking::orderBy('tanggal')->pluck('jumlah_meninggal','tanggal');
       $chart = new CovidChart;
       $chart->labels($tkposi->keys());
       $chart->dataset('Positif', 'bar',$tkposi->values())->backgroundColor('orange');
       $chart->dataset('Sembuh', 'bar',$tksembuh->values())->backgroundColor('green');
       $chart->dataset('Meninggal', 'bar',$tkmeninggal->values())->backgroundColor('red');

        return view("admin.index",compact("chart","title",'jumlah_positif','jumlah_sembuh','jumlah_meninggal'));
    }
}
