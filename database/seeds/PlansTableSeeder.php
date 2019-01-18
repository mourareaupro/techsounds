<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Plan::create([
            'name' => 'Monthly',
            'slug' => 'monthly',
            'stripe_plan' => 'monthly',
            'cost' => 9.99,
            'description' => '',
        ]);
    }
}
