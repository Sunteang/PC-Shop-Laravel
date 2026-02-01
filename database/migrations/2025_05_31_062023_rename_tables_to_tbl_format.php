<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::rename('users', 'tbluser');
        Schema::rename('computer', 'tblcomputer');
        Schema::rename('accessary', 'tblaccessary');
        Schema::rename('repair_requests', 'tblrepair_requests');
    }

    public function down(): void
    {
        Schema::rename('tbluser', 'users');
        Schema::rename('tblcomputer', 'computer');
        Schema::rename('tblaccessary', 'accessary');
        Schema::rename('tblrepair_requests', 'repair_requests');
    }
};
