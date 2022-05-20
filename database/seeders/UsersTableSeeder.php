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
                'name'           => 'Meira Armi',
                'email'          => 'meiraarmi@gmail.com',
                'password'       => bcrypt('123456789'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
