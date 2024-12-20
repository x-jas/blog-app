<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create(['name' => 'Food']);
        Category::create(['name' => 'Gaming']);
        Category::create(['name' => 'Lifestyle']);
        Category::create(['name' => 'Sports']);
        Category::create(['name' => 'Technology']);
        Category::create(['name' => 'Travel']);
        Category::create(['name' => 'Other']);
    }
}
