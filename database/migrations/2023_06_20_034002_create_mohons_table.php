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
        Schema::create('mohon', function (Blueprint $table) {
            $table->id();
            
            $table->string('tajuk')->nullable();
            $table->string('tujuan')->nullable();
            $table->text('latar_belakang')->nullable();
            $table->text('objektif')->nullable();

            $table->string('kod_osol')->nullable();
            $table->string('kos')->nullable();

            $table->foreignId('user_id');
            $table->foreignId('kaedah_pembangunan_id');
            $table->foreignId('jenis_permohonan_id');
            $table->foreignId('sumber_peruntukan_id');
            $table->foreignId('kaedah_perolehan_id');
            
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
        Schema::dropIfExists('mohon');
    }
};
