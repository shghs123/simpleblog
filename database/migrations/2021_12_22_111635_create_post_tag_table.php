<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{

    public function up() {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('post_tag');
    }
}
