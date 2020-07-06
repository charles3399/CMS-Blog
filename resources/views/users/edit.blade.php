@extends('layouts.app')

@section('content')
<div class="card shadow">
    <div class="card-header">My Profile</div>

    <div class="card-body">

        @include('partial.errors')

        <form action="{{ route('users.update-profile') }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="about">About Me</label>
                <textarea class="form-control" name="about" id="about" rows="5" cols="5">{{$user->about}}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
        <hr>

        <a class="btn btn-outline-warning" href="{{ route('users.change-password') }}" role="button" style="color: black">Change password</a>
    </div>
</div>
@endsection
