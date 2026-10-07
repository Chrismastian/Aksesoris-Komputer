<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::firstOrCreate(
            ['email' => 'admin@aksesoris.test'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );

        $this->call(ProductSeeder::class);
    }
}
