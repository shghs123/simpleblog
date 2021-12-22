@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 mt-2">
                <div class="row justify-content-between mb-2">
                    <h2 class="mb-0">Tags</h2>
                    <a href="{{ route('tag.create') }}" class="btn btn-primary float-right mb-1">New tag</a>
                </div>

                @if(count($tags) > 0)
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-center"><span class="font-weight-bold ">Title</span></td>
                            <td class="text-center"><span class="font-weight-bold">Post count</span></td>
                            <td class="text-center"><span class="font-weight-bold">Actions</span></td>
                        </tr>
                        @foreach($tags as $tag)
                            <tr>
                                <td class="align-middle text-center">{{ $tag->title }}</td>
                                <td class="align-middle text-center">{{ $tag->posts->count() }}</td>
                                <td>
                                    <div class="row justify-content-center px-2">
                                        <a class="btn btn-primary mr-1 mb-1" href="{{ route('tag.edit', $tag->id) }}">Edit</a>
                                        <form action="{{ route('tag.destroy', $tag->id) }}" method="POST" class="mb-1">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                            <button onclick="return confirm('Are you sure you want to delete {{ $tag->title }}?');" type="submit" class="btn btn-danger mr-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    @if(count($tags) > 0)
                        <div class="pagination">
                            <?php echo $tags->render();  ?>
                        </div>
                    @endif

                @else
                    <i>No tags, yet.</i>
                @endif

            </div>
        </div>
    </div>

@endsection
