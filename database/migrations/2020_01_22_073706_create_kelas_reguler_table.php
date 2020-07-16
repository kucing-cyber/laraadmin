<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasRegulerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_regulers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_rombel');
            $table->string('tingkat_pendidikan');
            $table->string('kejuruan');
            $table->string('nama_rombel');
            $table->string('wali_kelas');
            $table->string('id_rombel');
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
        Schema::dropIfExists('kelas_regulers');
    }
}
