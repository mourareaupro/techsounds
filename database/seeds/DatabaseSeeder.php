<?php

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
        $this->call(CategoryTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        //$this->call(TagsTableSeeder::class);
        //$this->call(PostsTableSeeder::class);



    }
}
