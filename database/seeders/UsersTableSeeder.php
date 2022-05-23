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
            [
                'id'             => 2,
                'name'           => 'Cevin Wahyu',
                'email'          => 'cevinwahyu@gmail.com',
                'password'       => bcrypt('123456789'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Bagus Prayogo',
                'email'          => 'bagus@gmail.com',
                'password'       => bcrypt('123456789'),
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'           => 'Dita Dwiksari',
                'email'          => 'ditadwikasari@gmail.com',
                'password'       => bcrypt('123456789'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
