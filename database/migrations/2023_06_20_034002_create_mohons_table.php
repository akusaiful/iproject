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
            
            $table->string('tajuk');
            $table->string('tujuan');
            $table->text('latar_belakang');
            $table->text('objektif');
            $table->foreignId('user_id');
            
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
