<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
   
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@gmail.com',
                'password'       => '$2y$10$wNIDxA5tfzPm6XEsjrt0IOS9dbUrhjZSigPvzruq2Rz0BEqudStyK',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Meira Armi',
                'email'          => 'meiraarmi@gmail.com',
                'password'       => bcrypt('123456789'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
