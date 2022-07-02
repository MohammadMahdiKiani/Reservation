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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('first_name')->after('id')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
            $table->string('phone_number', 11)->after('last_name')->unique();
            $table->char('role', 1)->default('0')->after('password');
            $table->char('active', 1)->default('1')->after('password');
            $table->string('email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColumn(['first_name', 'last_name', 'phone_number','role','active']);
        //     $table->string('name')->nullable()->after('id');
        //     $table->string('email')->unique()->change();
        // });
        Schema::dropIfExists('users');
        
    }
};
