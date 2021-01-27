<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasus2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasus2s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rw_id');
            $table->foreign('rw_id')->references('id')->on('rws')->onDelete('cascade');
            $table->integer("jumlah_positif");
            $table->integer("jumlah_sembuh");
            $table->integer("jumlah_meninggal");
            $table->date("tanggal");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasus2s');
    }
}
