@extends('layouts.app')

@section('content')
<div class="card mb-2">
    <div class="card-header">
        <div class="float-left">Posts</div>
        <a href="{{ route('posts.create') }}" class="float-right">Add New Post</a>
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
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="2">No posts yet.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
{{ $posts->links() }}
@stop