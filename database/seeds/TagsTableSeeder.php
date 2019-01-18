<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tags')->insert([
            ['tag' => 'Techno'],
            ['tag' => 'Techno Music'],
            ['tag' => 'Techno Tutorial'],
            ['tag' => 'Ableton Production']
        ]);
    }
}
