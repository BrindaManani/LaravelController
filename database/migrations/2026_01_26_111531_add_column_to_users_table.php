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
        if (Schema::hasTable('users') && !Schema::hasColumn('users', 'role_id', 'is_admin')) {
            Schema::table('users', function (Blueprint $table) {
                // in your migration file for creating/altering users table
                $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('cascade');

                $table->boolean('is_admin')->default(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users') && Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role_id');
                $table->dropColumn('is_admin');
            });
        }
    }
};
