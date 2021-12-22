@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-header">Edit # {{ $post->title }}</div>
                <div class="card-body">
                    <form id="post-creation-form" method="POST" action="{{ route('post.update', $post->slug) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-4">
                            <label for="title" class="col-md-2 col-form-label">Title</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" autocomplete="title" autofocus required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <textarea id="summernote" name="description" class="@error('description') is-invalid @enderror"> {{ $post->description }} </textarea>

                            @error('description')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-4">
                            <label for="tags[]" class="col-md-2 col-form-label">Tags</label>

                            <div class="col-md-10">
                                <select id="tags[]" class="multi-selector w-100 h-100" name="tags[]" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ $tag->selected ? "selected='selected'" : "" }} > {{ $tag->title }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0">
                            <button type="submit" class="btn btn-primary" id="btn-save">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
