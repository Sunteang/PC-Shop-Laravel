<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();

            // Point manually to tbluser instead of using ->constrained()
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('tbluser')->onDelete('cascade');

            $table->morphs('favoritable'); // favoritable_id (unsignedBigInteger), favoritable_type (string)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
