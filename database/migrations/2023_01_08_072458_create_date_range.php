<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateRange extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_range', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('start');
            $table->dateTimeTz('end');
            $table->dateTimeTz('start_mutasi');
            $table->dateTimeTz('end_mutasi');
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
        Schema::dropIfExists('date_range');
    }
}
