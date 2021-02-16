<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    public function index(Request $request){
        $title ='Dashboard';
        $jumlah_positif = DB::table('trackings')->sum('trackings.jumlah_positif');
        $jumlah_sembuh = DB::table('trackings')->sum('trackings.jumlah_sembuh');
        $jumlah_meninggal = DB::table('trackings')->sum('trackings.jumlah_meninggal');
        return view("admin.index",compact("title",'jumlah_positif','jumlah_sembuh','jumlah_meninggal'));
    }
}
