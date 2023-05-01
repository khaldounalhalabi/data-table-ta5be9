<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Friend;
use App\Models\House;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        House::factory(10)->create();
        User::factory(10)->create();
        Friend::factory(10)->create();
        Book::factory(10)->create();
    }
}
