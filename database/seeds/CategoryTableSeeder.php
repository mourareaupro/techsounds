<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();

        \App\Models\Category::insert([
            ['name' => 'Samples', 'slug' => 'samples', 'created_at' => $now, 'updated_at' => $now],
        ]);

        \App\Models\Category::insert([
            ['name' => 'Templates', 'slug' => 'templates', 'created_at' => $now, 'updated_at' => $now],
        ]);

        \App\Models\Category::insert([
            ['name' => 'Courses', 'slug' => 'courses', 'created_at' => $now, 'updated_at' => $now],
        ]);

        \App\Models\Category::insert([
            ['name' => 'Synths', 'slug' => 'synths', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
