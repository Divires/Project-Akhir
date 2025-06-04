@extends('layouts.admin')

@section('content')
    <h2>Welcome, Admin {{ auth()->user()->name }}</h2>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
