@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white text-center">Reset Password</h2>

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

        <form method="POST" action="{{ route('password.update') }}" class="mt-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                    class="w-full mt-1 px-4 py-2 border rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Enter new password"
                        class="w-full mt-1 px-4 py-2 border rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none pr-10 @error('password') border-red-500 @enderror">
                    <button type="button" onclick="togglePassword('password', 'toggleIcon')" 
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 dark:text-gray-300">
                        <i id="toggleIcon" class="fa fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 relative">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password</label>
                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password"
                        class="w-full mt-1 px-4 py-2 border rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none pr-10">
                    <button type="button" onclick="togglePassword('password_confirmation', 'toggleConfirmIcon')" 
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 dark:text-gray-300">
                        <i id="toggleConfirmIcon" class="fa fa-eye"></i>
                    </button>
                </div>
            </div>

            <script>
                function togglePassword(fieldId, iconId) {
                    const passwordInput = document.getElementById(fieldId);
                    const toggleIcon = document.getElementById(iconId);
                    
                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        toggleIcon.classList.remove('fa-eye');
                        toggleIcon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = 'password';
                        toggleIcon.classList.remove('fa-eye-slash');
                        toggleIcon.classList.add('fa-eye');
                    }
                }
            </script>

            <button type="submit"
                class="w-full mt-6 bg-blue-500 text-white px-4 py-2 rounded-lg font-medium transition duration-300 hover:bg-blue-700 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none">
                Reset Password
            </button>

            <p class="text-sm text-gray-600 dark:text-gray-300 text-center mt-4">
                Remember your password? 
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline dark:text-blue-400">Login</a>
            </p>
        </form>
    </div>
</div>
@endsection
