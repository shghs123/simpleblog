<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Post;
use App\Tag;
use PhpParser\Builder\FunctionLike;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'show'
        ]]);
    }

    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('user.post.index')->withPosts($posts);
    }

    public function create() {
        $tags = Tag::all();
        return view('user.post.create')->withTags($tags);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|unique:posts|min:5|max:100',
            'description' => 'required|min:10',
        ]);

        $this->savePost($request);

        return redirect()->route('post.index')->withSuccess('Your post is published!');
    }

    public function show(Post $post) {
        return view('user.post.show')->withPost($post);
    }

    public function edit(Post $post) {
        $tags = Tag::all();

        foreach ($tags as $tag) {
            $tag->selected = $post->tags->contains('id', $tag->id) ? true : false;
        }

        return view('user.post.edit')->withPost($post)->withTags($tags);
    }

    public function update(Request $request, Post $post) {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:10',
        ]);

        $this->updatePost($request, $post);

        return redirect()->route('post.index')->withSuccess('Your post is updated!');
    }

    public function destroy(Post $post) {
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('post.index')->withSuccess("Post deleted successfully!");
    }

    private function savePost(Request $request) {
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        $validTags = [];
        if ($request->newTags) {
            foreach ($request->tags as $value) {
                if (in_array($value, $request->newTags)) {
                    $newId = Tag::create([
                        'title' => $value
                    ])->id;
                    $validTags[] = $newId;
                } else {
                    $validTags[] = $value;
                }
            }
        } else {
            $validTags = $request->tags;
        }

        $post->tags()->attach($validTags);
    }

    private function updatePost(Request $request, Post $post) {
        $post->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        $validTags = [];
        if ($request->newTags) {
            foreach ($request->tags as $value) {
                if (in_array($value, $request->newTags)) {
                    $newId = Tag::create([
                        'title' => $value
                    ])->id;
                    $validTags[] = $newId;
                } else {
                    $validTags[] = $value;
                }
            }
        } else {
            $validTags = $request->tags;
        }

        $post->tags()->detach();
        $post->tags()->attach($validTags);
    }
}
