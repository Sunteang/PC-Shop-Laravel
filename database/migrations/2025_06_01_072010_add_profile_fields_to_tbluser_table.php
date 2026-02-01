<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tbluser', function (Blueprint $table) {
            $table->string('phone', 20)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('profile_image', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::table('tbluser', function (Blueprint $table) {
            $table->dropColumn(['phone', 'address', 'profile_image']);
        });
    }
};
