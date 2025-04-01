@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white text-center">Forgot Password</h2>

        {{-- Notifikasi Error --}}
        @if ($errors->any())
            <div id="error-alert" class="mt-4 p-3 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 border border-red-400 dark:border-red-600 rounded-lg transition-opacity duration-500">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <script>
                setTimeout(() => {
                    const alertBox = document.getElementById('error-alert');
                    if (alertBox) {
                        alertBox.classList.add('opacity-0');
                        setTimeout(() => alertBox.remove(), 500);
                    }
                }, 5000);
            </script>
        @endif

        {{-- Notifikasi Sukses --}}
        @if (session('status'))
            <div id="success-alert" class="mt-4 p-3 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 border border-green-400 dark:border-green-600 rounded-lg transition-opacity duration-500">
                {{ session('status') }}
            </div>

            <script>
                setTimeout(() => {
                    const successBox = document.getElementById('success-alert');
                    if (successBox) {
                        successBox.classList.add('opacity-0');
                        setTimeout(() => successBox.remove(), 500);
                    }
                }, 5000);
            </script>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="mt-4">
            @csrf
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                    class="w-full mt-1 px-4 py-2 border rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full mt-6 bg-blue-500 text-white px-4 py-2 rounded-lg font-medium transition duration-300 hover:bg-blue-700 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none">
                Send Reset Link
            </button>

            <p class="text-sm text-gray-600 dark:text-gray-300 text-center mt-4">
                Remember your password? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline dark:text-blue-400">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
