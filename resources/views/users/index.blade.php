@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            <h3 class="float-left">Users</h3>
        </div>

        <div class="card-body">
            @if ($users->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($user->email) }}" alt=""></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!$user->isAdmin())
                                        <form action="{{ route('users.make-admin', $user->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                        </form>
                                    @else    
                                        <strong>Admin</strong>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                </tbody>
                </table>
            @else
                No users yet...
            @endif


        </div>
    </div>
    
@endsection