<?php

namespace Database\Seeders;

use App\Models\Donate;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        Donate::factory(50)->create();
    }
}
