@extends('layouts.app')

@section('content')

    @if(count($posts) > 0)
        <div class="card mb-2">
            <div class="card-header">
                <div class="float-left">Trashed Posts</div>
            </div>
            <div class="card-body">
                <table class="table table-hover mb-0">
                    <thead class="text-center">
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="70px" height="70px"></td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-primary btn-sm">Restore</a>
                                    <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $posts->links() }}
    @else
        <div class="alert alert-primary"><h3 class="text-center pt-2">No trashed posts yet.</h3></div>
    @endif

@stop