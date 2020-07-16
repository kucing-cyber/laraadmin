<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGtkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g_t_k_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->longText('alamat');
            $table->bigInteger('telp')-> nullable();
            $table->string('email')->unique();
            $table->string('jabatan');
            $table->string('mapel');
            $table->string('SK');
            $table->string('TMT');
            $table->string('photo');
            $table->string('gtk_id');
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
        Schema::dropIfExists('g_t_k_s');
    }
}
