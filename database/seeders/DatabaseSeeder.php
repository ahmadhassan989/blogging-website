<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Database\Factories\UserFactory;

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
        $factory = new UserFactory();
        $factory->createAdminUser('ahmad@admin.me');

        User::factory(10)->create();

        Post::factory(5)->create();
    }
}
