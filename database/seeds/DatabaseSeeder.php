<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run() {
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(PostTagSeeder::class);
    }

}
