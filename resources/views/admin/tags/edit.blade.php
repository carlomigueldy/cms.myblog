@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Tag: {{ $tag->name }}</div>
        <div class="card-body">
            <form action="{{ route('tags.update', $tag->id) }}" method="post">
                @csrf 
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" name="name" value="{{ $tag->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Tag</button>
                </div>
            </form>
        </div>
    </div>
@endsection