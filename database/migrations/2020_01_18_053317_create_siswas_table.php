<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->bigInteger('NIPD')-> nullable();
            $table->string('jenis_kelamin');
            $table->string('NISN')-> nullable();
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->bigInteger('NIK')-> nullable();
            $table->string('agama');
            $table->longText('alamat');
            $table->bigInteger('telp')-> nullable();
            $table->string('nama_ayah');
            $table->integer('thn_lahir_ayah')-> nullable();
            $table->string('kerja_ayah')-> nullable();
            $table->bigInteger('NIK_ayah')-> nullable();
            $table->bigInteger('Telp_ayah')-> nullable();
            $table->string('nama_ibu');
            $table->integer('thn_lahir_ibu')-> nullable();
            $table->string('kerja_ibu')-> nullable();
            $table->bigInteger('NIK_ibu')-> nullable();
            $table->bigInteger('Telp_ibu')-> nullable();
            $table->string('Golongan');
            $table->string('Users_id');;
            $table->string('photo')->default('siswa.png');
            $table->string('angkatan');
            $table->string('id_rombel');
			$table->string('id_ekskul');
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
        Schema::dropIfExists('siswas');
    }
}
