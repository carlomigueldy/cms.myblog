@extends('layouts.app')

@section('content')
    @include('admin.inc.messages')

    <div class="card">
        <div class="card-header">Edit Profile</div>
        <div class="card-body">
            <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" value="{{ $user->name }}" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{ $user->email }}" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" value="{{ $user->profile->avatar }}" name="avatar" id="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About Me</label>
                    <textarea name="about" id="about" cols="6" rows="6" class="form-control">
                        {{ $user->profile->about }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="github">Github</label>
                    <input type="text" value="{{ $user->profile->github }}" name="github" id="github" class="form-control">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@stop