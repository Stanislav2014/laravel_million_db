<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 100)->create();
        factory(App\Article::class, 10)->create();
        factory(App\Comment::class, 10)->create();
    }
}
