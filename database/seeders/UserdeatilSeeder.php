<?php

namespace Database\Seeders;

use App\Models\Userdetail;
use Illuminate\Database\Seeder;

class UserdetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Userdetail::factory(10)->create();
    }
}
