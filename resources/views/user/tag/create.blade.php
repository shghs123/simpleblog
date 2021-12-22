@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-header">Create tag</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tag.store') }}">
                        @csrf

                        <div class="form-group row mb-4">
                            <label for="title" class="col-md-2 col-form-label">Title</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" placeholder="Some title.." autofocus required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0">
                            <button type="submit" class="btn btn-primary" id="btn-save">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
