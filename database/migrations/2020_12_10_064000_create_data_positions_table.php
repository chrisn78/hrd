<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_position');
            $table->string('level');
            $table->string('department');
            $table->integer('basic_salary');
            $table->string('remark');
            $table->softDeletes();
            $table->timestamps();
        });

        // Schema::table('data_positions', function (Blueprint $table) {
        // $table->string('department')->after('name_position');
        // });

        // Schema::table('data_positions', function (Blueprint $table) {
        // $table->string('level')->after('name_position');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_positions');
    }
}
