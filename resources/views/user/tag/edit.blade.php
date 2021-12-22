@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">Edit # {{ $tag->title }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tag.update', $tag->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-4">
                            <label for="title" class="col-md-2 col-form-label">Title</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $tag->title }}" autocomplete="title" autofocus required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
