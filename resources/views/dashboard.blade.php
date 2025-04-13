@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Welcome, {{ auth()->user()->name }}!</h1>
        <p>Use the navigation bar to manage your profile, gallery, and cart.</p>
    </div>
@endsection
