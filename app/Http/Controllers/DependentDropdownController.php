<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
class DependentDropdownController extends Controller
{
    public function index()
    {
        $title = 'Tracking';
        $provinsi = Provinsi::all()->pluck('nama_provinsi', 'id')->prepend(trans('Pilih Provinsi'), '');
        $kota = Kota::all()->pluck('nama_kota', 'id')->prepend(trans('Pilih Kota'), '');

        return view("admin.tracking.index", [
            'provinsi' => $provinsi,
            'kota' => $kota,
            'title' => $title
        ]);
    }
}
