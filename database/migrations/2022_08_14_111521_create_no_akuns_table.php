<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_akuns', function (Blueprint $table) {
            $table->id();
            $table->string('nama_akun');
            $table->enum('akun_types', ['pemasukan', 'pengeluaran','beban']);
            $table->integer('no_akun')->unique();
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
        Schema::dropIfExists('no_akuns');
    }
}
