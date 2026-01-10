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
        if (Schema::hasTable('userlists') && (!Schema::hasColumn('userlists', 'password', 'phone', 'role', 'status', 'gender', 'dob', 'address'))) {
            Schema::table('userlists', function (Blueprint $table) {
                $table->string('password');
                $table->string('phone');
                $table->string('role');
                $table->boolean('status');
                $table->string('gender');
                $table->date('dob');
                $table->text('address');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('userlists') && (!Schema::hasColumn('userlists', 'password', 'phone', 'role', 'status', 'gender', 'dob', 'address'))) {
            Schema::table('userlists', function (Blueprint $table) {
                $table->dropColumn('password');
                $table->dropColumn('phone');
                $table->dropColumn('role');
                $table->dropColumn('status');
                $table->dropColumn('gender');
                $table->dropColumn('dob');
                $table->dropColumn('address');
            });
        }
    }
};