<?php

namespace Database\Seeders;

use App\Models\Userlist;
use Illuminate\Database\Seeder;

class UserlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Userlist::factory(10)->create();
    }
}
