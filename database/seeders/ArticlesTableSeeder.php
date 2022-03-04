<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.

Article::truncate();
$Faker= \Faker\Factory::create();

//
for ($i = 0; $i < 50; $i++) {
    Article::create([
        'title' => $Faker->sentence,
        'body' => $Faker->paragraph,
    ]);
}


        }

}


