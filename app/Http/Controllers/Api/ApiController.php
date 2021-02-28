<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Tracking;
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
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
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
        ->first();
        $today = DB::table('provinsis')->select('provinsis.kode_provinsi','provinsis.nama_provinsi', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kotas','provinsis.id','=','kotas.provinsi_id')
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->where('provinsis.id',$id)
        ->whereDate('trackings.tanggal',Carbon::today())
        ->first();
        // dd($singelprovinsi);
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
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }

    public function singelkota($id){
        $allDay = DB::table('kotas')->select('kotas.kode_kota','kotas.nama_kota', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->where('kotas.id',$id)
        ->first();
        $today = DB::table('kotas')->select('kotas.kode_kota','kotas.nama_kota', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->where('kotas.id',$id)
        ->whereDate('trackings.tanggal',Carbon::today())
        ->first();
        // dd($singelkota);
        $data = [
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);
    }

    public function kecamatan(){
        $allDay = DB::table('kecamatans')->select('kecamatans.kode_kecamatan','kecamatans.nama_kecamatan', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('kecamatans.id')
        ->get();
        $today = DB::table('kecamatans')->select('kecamatans.kode_kecamatan','kecamatans.nama_kecamatan', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('kecamatans.id')
        ->get();
        // dd($kecamatan);
        $data = [
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);

    }
    public function singelkecamatan($id){
        $allDay = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan', 'kecamatans.kode_kecamatan', DB::raw('sum(kasuses.positif) as positif'),
            DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
        ->join('kasuses', 'rws.id', '=', 'kasuses.rw_id')
        ->where('kecamatans.id', $id)
        ->first();

    $today = DB::table('kecamatans')
        ->select('kecamatans.nama_kecamatan', 'kecamatans.kode_kecamatan', DB::raw('sum(kasuses.positif) as positif'),
            DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
        ->join('kasuses', 'rws.id', '=', 'kasuses.rw_id')
        ->where('kecamatans.id', $id)->whereDate('kasuses.tanggal', Carbon::today())
        ->first();
        // dd($singelkecamatan);
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

    public function kelurahan(){
        $allDay = DB::table('kelurahans')->select('kelurahans.kode_kelurahan','kelurahans.nama_kelurahan', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('kelurahans.id')
        ->get();
        $today = DB::table('kelurahans')->select('kelurahans.kode_kelurahan','kelurahans.nama_kelurahan', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('rws','kelurahans.id','=','rws.kelurahan_id')
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('kelurahans.id')
        ->get();
        // dd($kelurahan);
        $data = [
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);

    }

    public function singelkelurahan($id){
        $allDay = DB::table('kelurahans')
        ->select('kelurahans.nama_kelurahan', 'kelurahans.kode_kelurahan', DB::raw('sum(kasuses.positif) as positif'),
            DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
        ->join('kasuses', 'rws.id', '=', 'kasuses.rw_id')
        ->where('kelurahans.id', $id)
        ->first();

    $today = DB::table('kelurahans')
        ->select('kelurahans.nama_kelurahan', 'kelurahans.kode_kelurahan', DB::raw('sum(kasuses.positif) as positif'),
            DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
        ->join('kasuses', 'rws.id', '=', 'kasuses.rw_id')
        ->where('kelurahans.id', $id)->whereDate('kasuses.tanggal', Carbon::today())
        ->first();
        // dd($singelkelurahan);
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
    public function rw(){
        $allDay = DB::table('rws')->select('rws.kode_rw','rws.nomer_rw', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->groupBy('rws.id')
        ->get();
        $today = DB::table('rws')->select('rws.kode_rw','rws.nomer_rw', DB::raw('SUM(trackings.jumlah_positif) as positif'),
        DB::raw('SUM(trackings.jumlah_sembuh) as sembuh'),DB::raw('SUM(trackings.jumlah_meninggal) as meninggal'))
        ->join('trackings','rws.id','=','trackings.rw_id')
        ->whereDate('trackings.tanggal',Carbon::today())
        ->groupBy('rws.id')
        ->get();
        // dd($provinsi);
        $data = [
            'success' => true,
            'data' => [
                ['hari_ini' => $today,
                    'total' => $allDay],
            ],
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);

    }
    public function singelrw($id){
        $allDay = DB::table('rws')
        ->select('rws.nomer_rw', 'rws.kode_rw', DB::raw('sum(kasuses.positif) as positif'),
            DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
        ->join('kasuses', 'rws.id', '=', 'kasuses.rw_id')
        ->where('rws.id', $id)
        ->first();

    $today = DB::table('rws')
        ->select('rws.nomer_rw', 'rws.kode_rw', DB::raw('sum(kasuses.positif) as positif'),
            DB::raw('sum(kasuses.sembuh) as sembuh'), DB::raw('sum(kasuses.meninggal) as meninggal'))
        ->join('kasuses', 'rws.id', '=', 'kasuses.rw_id')
        ->where('rws.id', $id)->whereDate('kasuses.tanggal', Carbon::today())
        ->first();
        // dd($singelrw);
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
    public function Indonesia(){
        $positif = Tracking::sum('jumlah_positif');
        $sembuh  = Tracking::sum('jumlah_sembuh');
        $meninggal  = Tracking::sum('jumlah_meninggal');

        $response= [
            'success' => true,
            'data' => [
                        [
                            "name" => "Indonesia",
                            'positif'=>$positif,
                            'sembuh'=>$sembuh,
                            'meninggal'=>$meninggal,
                        ],
        ],
            'message' => 'berhasil',
        ];
        return response()->json($response);
        //  $positif = DB::table('rws')->select('trackings.jumlah_positif', 'trackings.jumlah_sembuh', 'trackings.jumlah_meninggal')
        //             ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
        //             ->sum('trackings.jumlah_positif');
        // $sembuh = DB::table('rws')->select('trackings.jumlah_sembuh', 'trackings.jumlah_sembuh', 'trackings.jumlah_meninggal')
        //             ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
        //             ->sum('trackings.jumlah_sembuh');
        // $meninggal = DB::table('rws')->select('trackings.jumlah_meninggal', 'trackings.sembuh', 'trackings.jumlah_meninggal')
        //             ->join('trackings', 'rws.id', '=', 'trackings.rw_id')
        //             ->sum('trackings.jumlah_meninggal');

        // $this->data = [
        //     'name' => 'Indonesia',
        //     'positif' => $positif,
        //     'sembuh' => $sembuh,
        //     'meninggal' => $meninggal,
        // ];
        // $data = [
        //     'success' => true,
        //     'data' => [
        //           $this->data,
        //       ],

        //     'message' => 'Berhasil'
        // ];
        // return response()->json($data,200);

    }
    public function positif()
    {
        $jumlah_positif = DB::table('trackings')
        ->select('trackings.jumlah_positif')
        ->sum('trackings.jumlah_positif');
        $this->data = [
            'name' => 'Total Positif',
            'value' => $jumlah_positif,
        ];

        $data = [
            'success' => true,
            'data' => $this->data,
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);

    }
    public function sembuh()
    {
        $jumlah_sembuh = DB::table('trackings')
        ->select('trackings.jumlah_sembuh')
        ->sum('trackings.jumlah_sembuh');
        $this->data = [
            'name' => 'Total Sembuh',
            'value' => $jumlah_sembuh,
        ];

        $data = [
            'success' => true,
            'data' => $this->data,
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);

    }
    public function meninggal()
    {
        $jumlah_meninggal = DB::table('trackings')
        ->select('trackings.jumlah_meninggal')
        ->sum('trackings.jumlah_meninggal');
        $this->data = [
            'name' => 'Total Meninggal',
            'value' => $jumlah_meninggal,
        ];

        $data = [
            'success' => true,
            'data' => $this->data,
            'message' => 'berhasil',
        ];
        return response()->json($data, 200);

    }

}
