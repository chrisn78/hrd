<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('data_karyawans', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('nik');
        //     $table->string('no_payroll');
        //     $table->integer('id_position');
        //     $table->date('join_date');
        //     $table->text('image');
        //     $table->string('nama_kary');
        //     $table->string('alamat');
        //     $table->string('agama');
        //     $table->string('tempat_lahir');
        //     $table->date('tgl_lahir');
        //     $table->string('jenis_kel');
        //     $table->string('gol_darah');
        //     $table->string('status');
        //     $table->string('pendidikan');
        //     $table->string('no_rek');
        //     $table->string('npwp');
        //     $table->string('bpjskes');
        //     $table->string('bpjstk');
        //     $table->softDeletes();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_karys');
    }
}