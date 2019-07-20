@extends('layouts.app')

@section('content')
    @include('admin.inc.messages')

    <div class="card bg-default">
        <div class="card-header">Create a New Post</div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Select a Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content"cols="5" rows="5" class="form-control">
                    </textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Create Post</button>
                </div>
            </form>
        </div>
    </div>
@stop