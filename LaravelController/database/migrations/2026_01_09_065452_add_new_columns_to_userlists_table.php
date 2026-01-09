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
        if (!Schema::hasTable('userlists')) {
            Schema::table('userlists', function (Blueprint $table) {
                $table->string('password');
                $table->string('confirm_password');
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
        Schema::table('userlists', function (Blueprint $table) {
            //
        });
    }
};
