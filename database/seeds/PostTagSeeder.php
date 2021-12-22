<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder {

    public function run() {
        DB::table('post_tag')->insert([
            'post_id' => 1,
            'tag_id' => 1,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 1,
            'tag_id' => 4,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 1,
            'tag_id' => 5,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 2,
            'tag_id' => 3,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 2,
            'tag_id' => 5,
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 3,
            'tag_id' => 2,
        ]);
    }
}
