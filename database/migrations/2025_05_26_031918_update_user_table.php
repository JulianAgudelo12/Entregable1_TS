<?php

/* Developed by Julián Agudelo Cifuentes */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cellphone')->after('password');
            $table->boolean('is_admin')->default(false)->after('cellphone');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cellphone', 'is_admin']);
        });
    }
};
