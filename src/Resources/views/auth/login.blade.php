@extends('xblade-auth::layouts.app')

@section('title', 'Login')

@section('content')
    <h2 class="text-2xl font-semibold text-gray-800 text-center">Login</h2>
    <form method="POST" action="{{ route('login') }}" class="mt-4">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full border p-2 rounded mb-2">
        <input type="password" name="password" placeholder="Password" class="w-full border p-2 rounded mb-2">
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Login</button>
    </form>
@endsection
