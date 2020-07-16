<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaEkskulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_ekskuls', function (Blueprint $table) {
          $table->string('id')->primary();
          $table->string('id_ekskul');
          $table->string('id_siswa');
          $table->string('nama_siswa');
          $table->string('NIPD');
          $table->string('NISN');
          $table->string('JK');
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
        Schema::dropIfExists('anggota_ekskuls');
    }
}
