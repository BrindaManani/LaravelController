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
        if (Schema::hasTable('userdetails') && Schema::hasColumn('userdetails', 'avatar')) {
            Schema::table('userdetails', function (Blueprint $table) {
                $table->dropColumn('avatar');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('userdetails') && !Schema::hasColumn('userdetails', 'avatar')) {
            Schema::table('userdetails', function (Blueprint $table) {
                $table->string('avatar');
            });
        }
    }
};
