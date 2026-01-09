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
        if (Schema::hasTable('carts') && Schema::hasColumn('product_id')) {
            Schema::table('carts', function (Blueprint $table) {
                //
                $table->dropColumn('product_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('carts', function (Blueprint $table) {
                //
            });

    }
};
