<?php

use Illuminate\Database\Seeder;
use App\User as UserEloquent;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserEloquent::create([
            'name' => '秉松',
            'email' => 'kevin@mail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
