<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ArticlesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        //$this->call(RestaurantSeeder::class);

        Comment::factory()
        ->times(3)
        ->create();
 
    }
}
