<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    public function index() {
        $tags = Tag::all();
        $tag = Tag::where('id', request()->tag)->first();

        if ($tag) {
            $posts = $tag->posts;
            return view('welcome')->withPosts($posts)->withTags($tags)->withSelectedTag($tag);
        } else {
            $posts = Post::orderBy('created_at', 'desc')->get();
            return view('welcome')->withPosts($posts)->withTags($tags);
        }
    }

}
