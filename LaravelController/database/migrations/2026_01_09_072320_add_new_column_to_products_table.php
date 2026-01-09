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
        if(!Schema::hasColumn('name', 'stock', 'description', 'image')){
            Schema::table('products', function (Blueprint $table) {
                //
                $table->string('name')->after('id');
                $table->integer('stock');
                $table->text('description')->after('name');
                $table->binary('image');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prducts', function (Blueprint $table) {
            //
        });
    }
};
