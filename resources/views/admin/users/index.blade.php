@extends('layouts.app')

@section('content')

    @if(count($users) > 0)
        <div class="card mb-2">
            <div class="card-header">
                <div class="float-left">Users</div>
                <a href="{{ route('users.create') }}" class="float-right">Add User</a>
            </div>
            <div class="card-body">
                <table class="table table-hover mb-0">
                    <thead class="text-center">
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Permission</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="text-center">
                                <td>
                                    <img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" width="50px" height="50px" style="border-radius: 50%;">
                                </td>
                                <td>{{ $user->name }}</td>
                                @if($user->admin)
                                    <td>
                                        <a href="#" class="btn btn-secondary btn-sm">Revoke</a>
                                    </td>
                                @else
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                                @endif

                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $users->links() }}
    @else
        <div class="alert alert-info">
            <p class="pt-3">No posts added yet. Click <a href="{{ route('users.create') }}">here</a> to add.</p>
        </div>
    @endif

@stop