<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;
    protected $fillable = ['jumlah_positif','jumlah_sembuh','jumlah_meninggal','tanggal','rw_id'];
    public $timestamps = true;

    public function negara(){
        return $this->belongsTo("App\Models\Negara",'negara_id');
    }
}
