@extends('layouts.app')

@section('content')

    @if(count($categories) > 0)
        <div class="card mb-2">
            <div class="card-header">
                <div class="float-left">Categories</div>
                <a href="{{ route('categories.create') }}" class="float-right">Add Category</a>
            </div>
            <div class="card-body">
                <table class="table table-hover mb-0">
                    <thead class="text-center">
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="text-center">
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('categories.posts', $category->id) }}" class="btn btn-secondary btn-sm">Posts</a>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $categories->links() }}
    @else
        <div class="alert alert-info">
            <p class="pt-3">No categories added yet. Click <a href="{{ route('categories.create') }}">here</a> to add.</p>
        </div>
    @endif

    @if(count($trashed) > 0)
        <div class="card mb-2">
            <div class="card-header">
                <div class="float-left">Trashed Categories</div>
            </div>
            <div class="card-body">
                <table class="table table-hover mb-0">
                    <thead class="text-center">
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($trashed as $trash)
                            <tr>
                                <td>{{ $trash->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('categories.restore', $trash->id) }}" class="btn btn-primary btn-sm">Restore</a>
                                    <a href="{{ route('categories.delete', $trash->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $trashed->links() }}
    @endif

@stop