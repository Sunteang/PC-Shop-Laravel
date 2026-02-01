<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('repair_requests', function (Blueprint $table) {
            $table->dropColumn(['phone', 'contact_method', 'contact_time']);
        });
    }

    public function down(): void
    {
        Schema::table('repair_requests', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('contact_method')->nullable();
            $table->string('contact_time')->nullable();
        });
    }
};
