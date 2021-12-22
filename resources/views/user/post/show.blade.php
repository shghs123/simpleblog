@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h2 class="w-100 border-bottom border-dark border-3 font-weight-bold pb-2">{{ $post->title }}</h2>
            </div>
        </div>

        <div class="row col-12 mx-0 px-0 mb-4">
            <div class="col-12 col-md-6">
                <span class="opacity-50">Creator: {{ $post->user->name }}</span>
            </div>
            <div class="d-flex col-12 col-md-6 justify-content-md-end">
                <span class="opacity-50">Published: {{ $post->created_at }}</span>
            </div>
        </div>

        <div class="row mx-0">
            <div class="col-12">
                <span>
                    Tags:
                    @if(count($post->tags) > 0)
                        @foreach($post->tags as $tag)
                            <span class="mr-1">#{{ $tag->title }}</span>
                        @endforeach
                    @else
                    -
                    @endif
                </span>
            </div>
        </div>

        <div class="row px-3">
            <div class="col-12">
                {!! $post->description !!}
            </div>
        </div>
    </div>
@endsection
