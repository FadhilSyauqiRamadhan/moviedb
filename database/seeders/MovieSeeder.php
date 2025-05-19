<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title' => 'The Great Escape',
                'year' => 1963,
                'actors' => 'Steve McQueen, James Garner',
                'cover_image' => 'covers/the-great-escape.jpg',
                'category_id' => 1, // Sesuaikan dengan ID kategori Action
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Hangover',
                'year' => 2009,
                'actors' => 'Bradley Cooper, Ed Helms',
                'cover_image' => 'covers/the-hangover.jpg',
                'category_id' => 2, // Comedy
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Interstellar',
                'year' => 2014,
                'actors' => 'Matthew McConaughey, Anne Hathaway',
                'cover_image' => 'covers/interstellar.jpg',
                'category_id' => 4, // Sci-Fi
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
