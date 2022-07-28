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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name');
            $table->char('gender',1);
            $table->string('address');
            $table->string('phone_number',11);
            $table->char('football',1);
            $table->char('volleyball',1);
            $table->char('basketball',1);
            $table->char('handball',1);
            $table->char('locker_room',1);
            $table->char('drinking_water',1);
            $table->char('bathroom',1);
            $table->string('src');
            $table->string('price');
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
        Schema::dropIfExists('gyms');
    }
};
