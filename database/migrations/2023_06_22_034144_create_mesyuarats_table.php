<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesyuarat', function (Blueprint $table) {
            $table->id();
            $table->integer('bil');
            $table->integer('tahun');
            $table->date('tarikh');
            $table->string('masa');
            $table->string('tempat');
            $table->text('catatan');
            $table->foreignId('jenis_mesyuarat_id');
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
        Schema::dropIfExists('mesyuarat');
    }
};
