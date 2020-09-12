@extends('layouts.app')

@section('content')
    <div class="container">
{{--        <h2 style="text-align: center">Who {{ $profile->user()->username }} Follows</h2>--}}
        <div class="list-group">
            @foreach($users as $user )
            <a href="/profile/{{ $user->id }}" class="list-group-item list-group-item-action">
                {{ $user->username }}
            </a>
            @endforeach
        </div>
    </div>
@endsection
