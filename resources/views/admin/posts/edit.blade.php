@extends('layouts.app')

@section('content')
    @include('admin.inc.messages')

    <div class="card bg-default">
        <div class="card-header">Edit Post: {{ $post->title }}</div>
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                        <label for="category">Select a Category</label>
                        <select name="category_id" class="form-control">
                            <option value="{{ $post->category_id }}" disabled>{{ $post->category->name }}</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content"cols="5" rows="5" class="form-control">
                        {{ $post->content }}
                    </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </form>
        </div>
    </div>
@stop