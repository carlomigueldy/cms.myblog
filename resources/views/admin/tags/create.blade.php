@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create New Tag</div>
        <div class="card-body">
            <form action="{{ route('tags.store') }}" method="post">
                @csrf 
                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Tag</button>
                </div>
            </form>
        </div>
    </div>
@endsection