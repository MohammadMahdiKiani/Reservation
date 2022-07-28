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
        Schema::create('reserved', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gyms_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('day');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('reserv_code')->unique();

            $table->unique(['day', 'start_time', 'end_time']);
            $table->foreign('gyms_id')->references('id')->on('gyms')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('reserved');
    }
};
