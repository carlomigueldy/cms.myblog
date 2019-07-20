@extends('layouts.app')

@section('content')
    @if(count($tags) > 0)
    <div class="card mb-2">
        <div class="card-header">
            <div class="float-left">Tags</div>
            <a href="{{ route('tags.create' )}}" class="float-right">Add Tag</a>
            <a href="{{ route('tags.trashed' )}}" class="float-right mr-2">View Trashed</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                                    @csrf 
                                    @method('DELETE')
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button type="submit" class="btn btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $tags->links() }}
    @else 
    <div class="alert alert-info">
        <p class="pt-3">No tags added yet. Click <a href="{{ route('tags.create') }}">here</a> to add.</p>
    </div>
    @endif
@stop