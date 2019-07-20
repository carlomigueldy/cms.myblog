@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
        <div class="card">
            <div class="card-header">Posts of Category: {{ $category->name }}</div>
            <div class="card-body">
                <table class="table table-hover">
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
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <button type="submit" class="btn btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            <p class="text-center-pt-3">This category hasn't been used in a post.</p>
        </div>
    @endif
@stop