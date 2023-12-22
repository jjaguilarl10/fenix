<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role, App\Models\User, App\Models\State;

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
        $this->call(StateSeeder::class);
        $this->call(GenerSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
