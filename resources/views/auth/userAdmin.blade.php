@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Management Dashboard</h1>
        <p>Here users roles in the site can be managed</p>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td><edit-user-role-permissions user-id="{{ $user->id }}" user-role="{{ $user->role }}"></edit-user-role-permissions></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
