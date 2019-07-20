@extends('layouts.app')

@section('content')
    @if(count($tags) > 0)
    <div class="card mb-2">
        <div class="card-header">
            <div class="float-left">Trashed Tags</div>
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
                                <a href="{{ route('tags.restore', $tag->id) }}" class="btn btn-primary btn-sm">Restore</a>
                                <a href="{{ route('tags.delete', $tag->id) }}" class="btn btn-danger btn-sm">Delete</a>
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