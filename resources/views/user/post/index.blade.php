@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <div class="row justify-content-center">
            <div class="col-12 mt-2">
                <div class="row justify-content-between mb-2">
                    <h2 class="mb-0">Posts</h2>
                    <a href="{{ route('post.create') }}" class="btn btn-primary float-right mb-1">New post</a>
                </div>

                @if(count($posts) > 0)
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-center"><span class="font-weight-bold">Title</span></td>
                            <td class="text-center"><span class="font-weight-bold">Creator</span></td>
                            <td class="text-center"><span class="font-weight-bold">Actions</span></td>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <td class="align-middle text-center">{{ $post->title }}</td>
                                <td class="align-middle text-center">{{ $post->user->name }}</td>
                                <td>
                                    <div class="row justify-content-center px-2">
                                        <a class="btn btn-warning mr-1 mb-1" href="{{ route('post.show', $post->slug) }}">View </a>
                                        <a class="btn btn-primary mr-1 mb-1" href="{{ route('post.edit', $post->slug) }}">Edit</a>
                                        <form action="{{ route('post.destroy', $post->slug) }}" method="POST" class="mb-1">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button onclick="return confirm('Are you sure you want to delete {{ $post->title }}?');" type="submit" class="btn btn-danger mr-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    @if(count($posts) > 0)
                        <div class="pagination">
                            <?php echo $posts->render();  ?>
                        </div>
                    @endif

                @else
                    <i>No posts, yet.</i>
                @endif

            </div>
        </div>
    </div>

@endsection
