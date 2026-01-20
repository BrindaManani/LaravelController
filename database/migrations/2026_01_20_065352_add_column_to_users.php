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
        if (Schema::hasTable('users') && (!Schema::hasColumn('phone', 'role', 'status', 'gender', 'dob', 'address', 'city', 'state', 'country', 'pincode')))
            Schema::table('users', function (Blueprint $table) {
                $table->string('phone')->after('remember_token');
                $table->string('role')->default('user')->after('phone');
                $table->string('status')->default('active')->after('role');
                $table->string('gender')->nullable()->after('status');
                $table->date('dob')->nullable()->after('gender');
                $table->text('address')->nullable()->after('dob');
                $table->string('city')->nullable()->after('address');
                $table->string('state')->nullable()->after('city');
                $table->string('country')->nullable()->after('state');
                $table->string('pincode')->nullable()->after('country');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('users') && Schema::hasColumn('phone', 'role', 'status', 'gender', 'dob', 'address', 'city', 'state', 'country', 'pincode')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('phone');
                $table->dropColumn('role');
                $table->dropColumn('status');
                $table->dropColumn('gender');
                $table->dropColumn('dob');
                $table->dropColumn('address');
                $table->dropColumn('city');
                $table->dropColumn('state');
                $table->dropColumn('country');
                $table->dropColumn('pincode');
            });
        }
    }
};
