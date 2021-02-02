<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use Validator;
class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Provinsi',
            'data' => $provinsi
        ], 200);
    }

    public function store(Request $request)
    {
        //  Validate Data
        $validator = Validator::make($request->all(),[
            'kode_provinsi' =>  'required|unique:provinsis',
            'nama_provinsi' =>  'required',
        ],
            [
                'kode_provinsi.required' => 'Masukkan Kode Provinsi !',
                'nama_provinsi.required' => 'Masukkan Nama Provinsi !',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Data Yang Kosong',
                'data'  => $validator->errors()
            ], 400);
        } else{
            $provinsi = Provinsi::create([
                'kode_provinsi'     => $request->input('kode_provinsi'),
                'nama_provinsi'   => $request->input('nama_provinsi'),
            ]);

            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'Provinsi Berhasil Disimpan!',
                ], 200);
            } else{
                return response()->json([
                    'success' => false,
                    'message' => 'Provinsi Gagal Disimpan!',
                ], 400);
            }
        }
    }

    public function show($id)
    {
        $provinsi = Provinsi::whereId($id)->first();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Provinsi!',
                'data' => $provinsi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi Tidak Ditemukan!',
                'data' => ''
            ], 404);
        }
    }

    public function update(Request $request,$id)
    {
        //Validate Data
        $validator = Validator::make($request->all(),[
            'kode_provinsi' => 'required|unique:provinsis',
            'nama_provinsi' => 'required',
        ],
            [
                'kode_provinsi.required' => 'Masukkan Kode Provinsi!',
                'nama_provinsi.required' => 'Masukkan Nama Provinsi!',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Data Yang Kosong!',
                'data' => $validator->errors()
            ], 400);
        } else {

            $provinsi = Provinsi::findOrFail($id);
            $provinsi->kode_provinsi = $request->kode_provinsi;
            $provinsi->nama_provinsi = $request->nama_provinsi;
            $provinsi->save();

            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'Provinsi Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'succes' => false,
                    'message' => 'Provinsi Gagal Diupdate',
                ], 500);
            }
        }
    }

    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Provinsi Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi Gagal Dihapus!',
            ], 500);
        }
    }
}
