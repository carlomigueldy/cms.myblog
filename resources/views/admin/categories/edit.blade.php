@extends('layouts.app')

@section('content')
    @include('admin.inc.messages')

    <div class="card bg-default">
        <div class="card-header">Edit Category</div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@stop