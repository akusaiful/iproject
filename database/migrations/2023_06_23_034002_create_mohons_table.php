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
            // $table->foreignId('kaedah_pembangunan_id')->constrained('kaedah_pembangunan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kaedah_pembangunan_id')->constrained('kaedah_pembangunan');            
            $table->foreignId('jenis_permohonan_id')->constrained('jenis_permohonan');
            $table->foreignId('sumber_peruntukan_id')->constrained('sumber_peruntukan');
            $table->foreignId('kaedah_perolehan_id')->constrained('kaedah_perolehan');

            // $table->string('file_dokumen_proses_semasa')->nullable();
            // $table->string('file_dokumen_proses_semasa_size')->nullable();
            // $table->string('file_dokumen_proses_semasa_type')->nullable();

            // $table->string('file_dokumen_proses_cadangan')->nullable();
            // $table->string('file_dokumen_proses_cadangan_size')->nullable();
            // $table->string('file_dokumen_proses_cadangan_type')->nullable();

            $table->string('status_borang')->length(10);
            
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
