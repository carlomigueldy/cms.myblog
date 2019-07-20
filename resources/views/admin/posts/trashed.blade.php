@extends('layouts.app')

@section('content')
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
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="70px" height="70px"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('posts.restore', $post->id) }}" class="btn m-1">Restore</a>
                                <a href="{{ route('posts.delete', $post->id) }}" class="btn m-1">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="alert alert-primary text-center" colspan="4">No trashed posts yet.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
{{ $posts->links() }}
@stop