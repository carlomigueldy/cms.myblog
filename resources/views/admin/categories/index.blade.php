@extends('layouts.app')

@section('content')
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
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <button type="submit" class="btn btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $categories->links() }}
@stop