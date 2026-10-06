<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@aksesoris.test'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );

        $this->call(ProductSeeder::class);
    }
}
