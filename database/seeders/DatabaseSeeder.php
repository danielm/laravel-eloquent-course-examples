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
        \App\Models\User::factory(1)->create();
        \App\Models\City::factory(10)->create();

        \App\Models\Company::factory(5)->create();

        \App\Models\Project::factory(20)->create();
    }
}
