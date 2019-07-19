@extends('layouts.app')

@section('content')
<div class="card">
    <table class="table table-hover">
        <thead>
            <th>Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                            @method('_DELETE')
                            <button type="submit" class="btn">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop