@extends('layouts.app')

@section('content')
<div class="hero mb-5">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Simple blog
            </div>
        </div>
    </div>
</div>
<div class="container pb-5">
    <a name="posts"></a>
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="font-weight-bolder">Tags</h2>
        </div>
        <div class="col-12">
            @if(count($tags) > 0)
                <span>
                    @foreach($tags as $tag)
                        <a class="mr-2" href="/?tag={{ $tag->id }}#posts">#{{ $tag->title }}</a>
                    @endforeach
                    <a class="mr-2" href="/#posts">#all</a>
                </span>
            @else
                <span>No tags, yet.</span>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="d-flex col-12 justify-content-between">
            <h2 class="font-weight-bolder mb-3">
                Posts
            </h2>
            @if(isset($selectedTag))
                <h3 class="font-weight-bolder mb-3">
                    #{{ $selectedTag->title }}
                </h3>
            @endif
        </div>

        @foreach($posts as $post)
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row mx-0 px-3">
                            <h3 class="card-title font-weight-bold cursor-pointer">
                                <a class="text-dark" href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                        </div>

                        <div class="row mx-0 px-0">
                            <div class="col-12 col-md-6">
                                <h6 class="card-subtitle mb-2 text-muted">Creator: {{ $post->user->name }}</h6>
                            </div>
                            <div class="d-flex col-12 col-md-6 justify-content-md-end">
                                <h6 class="card-subtitle mb-2 text-muted">Creation: {{ $post->created_at }}</h6>
                            </div>
                        </div>

                        @if(count($post->tags) > 0)
                            <div class="row mx-0">
                                <div class="col-12">
                                    <span>
                                        @foreach($post->tags as $tag)
                                            <a class="mr-2" href="/?tag={{ $tag->id }}#posts">#{{ $tag->title }}</a>
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        @endif

                        <div class="row mx-0 px-3">
                            <p class="card-text">
                                {!! $post->description !!}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection
