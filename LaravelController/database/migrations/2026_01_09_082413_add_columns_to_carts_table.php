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
        if(Schema::hastable('carts') && !(Schema::hasColumn('product_id', 'paid_amount'))){
        Schema::table('carts', function (Blueprint $table) {
            //
            
            $table->foreignId('product_id')->constrained()->after('user_id');
            $table->float('paid_amount')->after('total');
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
