<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $users= [
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'Ram',
                'email' => 'ram@test.com',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'Hari',
                'email' => 'hari@test.com',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'Koko',
                'email' => 'koko@test.com',
                'password' => Hash::make('123456789'),
            ],

        ];
        DB::table('users')->insert($users);
    }
}
