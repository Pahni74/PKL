<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rw extends Model
{
    protected $fillable = ['kode_rw','nomer_rw','kelurahan_id'];
    public $timestamps = true;
    use HasFactory;

    public function Kelurahan(){
        return $this->belongsTo('App\Models\Kelurahan','kelurahan_id');
    }
    public function tracking()
    {
        return $this->hasOne('App\Models\Tracking','rw_id');
    }
}
