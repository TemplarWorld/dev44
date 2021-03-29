<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'              => 1,
                'name'            => 'Admin',
                'email'           => 'admin@admin.com',
                'password'        => bcrypt('password'),
                'remember_token'  => null,
                'two_factor_code' => '',
                'telephone'       => '',
                'street_address'  => '',
                'city'            => '',
                'state_province'  => '',
                'country'         => '',
                'zip_postal_code' => '',
            ],
        ];

        User::insert($users);
    }
}
