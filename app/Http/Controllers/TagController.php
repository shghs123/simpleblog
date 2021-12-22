<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $tags = Tag::orderBy('created_at')->paginate(10);

        return view('user.tag.index')->withTags($tags);
    }

    public function create() {
        return view('user.tag.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|unique:tags|min:3|max:30',
        ]);

        Tag::create([
            'title' => $request->title
        ]);

        return redirect()->route('tag.index')->withSuccess('Your tag is created!');
    }

    public function edit(Tag $tag) {
        return view('user.tag.edit')->withTag($tag);
    }

    public function update(Request $request, Tag $tag) {
        $request->validate([
            'title' => 'required|unique:tags|min:3|max:30',
        ]);

        $tag->update([
            'title' => $request->title
        ]);

        return redirect()->route('tag.index')->withSuccess('Your tag is updated!');
    }

    public function destroy(Tag $tag) {
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('tag.index')->withSuccess("Tag deleted successfully!");
    }
}
