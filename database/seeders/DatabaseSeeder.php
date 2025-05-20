<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
            public function run(): void
        {
            $this->call([
                CategorySeeder::class,
            ]);

            // Pastikan minimal 5 kategori sudah ada dulu
            Movie::factory(10)->create();

//             User::factory()->create([
//                 'name' => 'Test User',
//                 'email' => 'test@example.com',
//             ]);
     }
}
