<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder {

    public function run() {
        DB::table('tags')->insert([
            'id' => 1,
            'title' => 'Space',
        ]);

        DB::table('tags')->insert([
            'id' => 2,
            'title' => 'Weather',
        ]);

        DB::table('tags')->insert([
            'id' => 3,
            'title' => 'Economy',
        ]);

        DB::table('tags')->insert([
            'id' => 4,
            'title' => 'Telescope',
        ]);

        DB::table('tags')->insert([
            'id' => 5,
            'title' => 'Hot🔥',
        ]);
    }
}
