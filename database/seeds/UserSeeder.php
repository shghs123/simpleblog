<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

    public function run() {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'TestUser',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
        ]);
    }

}
