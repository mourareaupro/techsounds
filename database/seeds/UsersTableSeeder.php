<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'mathieu',
            'email' => 'mattminimal@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('admin'),
            'email_verified_at' => Carbon::now(),
        ]);
        User::create([
            'name' => 'Dupont',
            'email' => 'dupont@chezlui.fr',
            'password' => bcrypt('user'),
            'email_verified_at' => Carbon::now(),
        ]);
        User::create([
            'name' => 'Martin',
            'email' => 'martin@chezlui.fr',
            'password' => bcrypt('user'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
