<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Http;
class ApiController extends Controller
{

    public $data = [];
    public function global()
    {
        $response = Http::get('https://api.kawalcorona.com')->json();
        foreach ($response as $data => $val) {
        $raw = $val['attributes'];
        $res = [
            'Negara' => $raw['Country_Region'],
            'Positif' => $raw['Confirmed'],
            'Sembuh' => $raw['Recovered'],
            'Meninggal' => $raw['Deaths']
        ];
        array_push($this->data, $res);
    }
    $data = [
        'Succes' => true,
        'Data' => $this->data,
        'Message' => 'Berhasil'
    ];
    return response()->json($data,200);
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
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('provinsis.id')
        ->get();
        // dd($provinsi);
        $data = [
            'status' => 200,
            'data' => [
                'Hari Ini' =>$today,
                'Total' => $allDay
              ],

            'message' => 'Berhasil'
        ];
        return response()->json($data,200);
    }
    public function singelprovinsi($id){
        $allDay = DB::table('provinsis')->select('provinsis.kode_provinsi','provinsis.nama_provinsi', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.provinsi_id')
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->where('provinsis.id',$id)
        ->get();
        $today = DB::table('provinsis')->select('provinsis.kode_provinsi','provinsis.nama_provinsi', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.provinsi_id')
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->where('provinsis.id',$id)
        ->get();
        $provinsi = Provinsi::whereId($id)->first();
        // dd($provinsi);
        $data = [
            'status' => 200,
            'data' => [
                'Hari Ini' =>$today,
                'Total' => $allDay
              ],

            'message' => 'Berhasil'
        ];
        return response()->json($data,200);
    }

    public function kota(){
        $allDay = DB::table('kotas')->select('kotas.kode_kota','kotas.nama_kota', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('kotas.id')
        ->get();
        $today = DB::table('kotas')->select('kotas.kode_kota','kotas.nama_kota', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('kotas.id')
        ->get();
        // dd($kota);
        $data = [
            'status' => 200,
            'data' => [
                'Hari Ini' =>$today,
                'Total' => $allDay
              ],

            'message' => 'Berhasil'
        ];
        return response()->json($data,200);
    }

    public function singelkota($id){
        $allDay = DB::table('kotas')->select('kotas.kode_kota','kotas.nama_kota', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->where('kotas.id',$id)
        ->get();
        $today = DB::table('kotas')->select('kotas.kode_kota','kotas.nama_kota', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->where('kotas.id',$id)
        ->get();
        $kota = Kota::whereId($id)->first();
        // dd($kota);
        $data = [
            'status' => 200,
            'data' => [
                'Hari Ini' =>$today,
                'Total' => $allDay
              ],

            'message' => 'Berhasil'
        ];
        return response()->json($data,200);
    }

    public function kecamatan(){
        $allday = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('kecamatans.id')
        ->get();

        $today = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('kecamatans.id')
        ->get();

            $positif = DB::table('rws')->select('trackings.jumlah_positif')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_positif');
            $sembuh = DB::table('rws')->select('trackings.jumlah_sembuh')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_sembuh');
            $meninggal = DB::table('rws')->select('trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => [
                        'Hari Ini' => $today,
            'Data' => [
                        'Kecamatan' => $allday,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
                ],
            ],
        ]);

    }
    public function singelkecamatan($id){
        $kecamatan = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->where('kecamatans.id',$id)
        ->groupBy('kecamatans.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('trackings.jumlah_positif')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_positif');
            $sembuh = DB::table('rws')->select('trackings.jumlah_sembuh')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_sembuh');
            $meninggal = DB::table('rws')->select('trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => $kecamatan,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
        ]);

    }

    public function kelurahan(){
        $allday = DB::table('kelurahans')
        ->select('kelurahans.nama_kelurahan',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('kelurahans.id')
        ->get();

        $today = DB::table('kelurahans')
        ->select('kelurahans.nama_kelurahan',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('kelurahans.id')
        ->get();

            $positif = DB::table('rws')->select('trackings.jumlah_positif')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_positif');
            $sembuh = DB::table('rws')->select('trackings.jumlah_sembuh')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_sembuh');
            $meninggal = DB::table('rws')->select('trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => [
                        'Hari Ini' => $today,
            'Data' => [
                        'Kecamatan' => $allday,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
                ],
            ],
        ]);

    }

    public function singelkelurahan($id){
        $kelurahan = DB::table('kelurahans')
        ->select('kelurahans.nama_kelurahan',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->where('kelurahans.id',$id)
        ->groupBy('kelurahans.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('trackings.jumlah_positif')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_positif');
            $sembuh = DB::table('rws')->select('trackings.jumlah_sembuh')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_sembuh');
            $meninggal = DB::table('rws')->select('trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data'  => $kelurahan,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'message' => ' Berhasil!',
        ]);

    }
    public function rw(){
        $allday = DB::table('rws')
        ->select('rws.nomer_rw',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('rws.id','tanggal')
        ->get();

        $today = DB::table('rws')
        ->select('rws.nomer_rw',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('rws.id','tanggal')
        ->get();

            $positif = DB::table('rws')->select('trackings.jumlah_positif')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_positif');
            $sembuh = DB::table('rws')->select('trackings.jumlah_sembuh')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_sembuh');
            $meninggal = DB::table('rws')->select('trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => [
                        'Hari Ini' => $today,
            'Data' => [
                        'Rw' => $allday,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'Message' => ' Berhasil!',
                ],
            ],
        ]);

    }
    public function singelrw($id){
        $rw = DB::table('rws')
        ->select('rws.nomer_rw',
        DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),
        DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->where('rws.id',$id)
        ->groupBy('rws.id','tanggal')
        ->first();
            $positif = DB::table('rws')->select('trackings.jumlah_positif')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_positif');
            $sembuh = DB::table('rws')->select('trackings.jumlah_sembuh')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_sembuh');
            $meninggal = DB::table('rws')->select('trackings.jumlah_meninggal')->join('trackings','rws.id','=','trackings.rw_id')->sum('trackings.jumlah_meninggal');
        // dd($provinsi);
        return response([
            'Success' => true,
            'Data' => $rw,
            'Total' =>[
                        'Jumlah Positif' => $positif,
                        'Jumlah Sembuh' => $sembuh,
                        'Jumlah Meninggal' => $meninggal,
                    ],
                    'Message' => ' Berhasil!',
        ]);

    }
    public function Indonesia(){
        $positif = DB::table('trackings')
                        ->sum('trackings.jumlah_positif');

        $sembuh = DB::table('trackings')
                        ->sum('trackings.jumlah_sembuh');

        $meninggal = DB::table('trackings')
                        ->sum('trackings.jumlah_meninggal');

        return response([
                    'Success' => true,
                    'Data' => [
                    'Name' => 'Indonesia',
                    'Positif'=> $positif,
                    'Sembuh'=> $sembuh,
                    'Meninggal'=> $meninggal,
                            ],
            'Message' => ' Berhasil!',

                        ]);

    }
    public function positif()
    {
        $jumlah_positif = DB::table('trackings')
        ->select('trackings.jumlah_positif')
        ->sum('trackings.jumlah_positif');
        $data = [
            'status' => true,
            'data' => [
                'Name' =>'Jumlah Positif',
                'Value' => $jumlah_positif
              ],

            'message' => 'Berhasil'
        ];
        return response()->json($data);

    }
    public function sembuh()
    {
        $jumlah_sembuh = DB::table('trackings')
        ->select('trackings.jumlah_sembuh')
        ->sum('trackings.jumlah_sembuh');
        $data = [
            'status' => true,
            'data' => [
                'Name' =>'Jumlah Sembuh',
                'Value' => $jumlah_sembuh
              ],

            'message' => 'Berhasil'
        ];
        return response()->json($data);

    }
    public function meninggal()
    {
        $jumlah_meninggal = DB::table('trackings')
        ->select('trackings.jumlah_meninggal')
        ->sum('trackings.jumlah_meninggal');
        $data = [
            'status' => true,
            'data' => [
                'Name' =>'Jumlah Meninggal',
                'Value' => $jumlah_meninggal
              ],

            'message' => 'Berhasil'
        ];
        return response()->json($data);

    }

}
