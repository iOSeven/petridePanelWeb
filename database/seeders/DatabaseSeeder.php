<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        \App\Models\Role::factory()->count(1)->create(['name' => 'admin']);
        \App\Models\Role::factory()->count(1)->create(['name' => 'rider']);
        \App\Models\Role::factory()->count(1)->create(['name' => 'client']);
    }
}
