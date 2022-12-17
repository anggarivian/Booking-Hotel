<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'      => 'User',
                'email'     => 'User@mail.com',
                'phone'     => 'User',
                'address'   => 'User',
                'password'  => bcrypt('12345'),
                'roles_id'  => 2
            ],
            [
                'name'      => 'Admin',
                'email'     => 'Admin@mail.com',
                'phone'     => 'Admin',
                'address'   => 'Admin',
                'password'  => bcrypt('12345'),
                'roles_id'  => 1
            ]
        ];

        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
