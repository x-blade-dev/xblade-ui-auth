@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white text-center">Login</h2>

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
                        setTimeout(() => alertBox.remove(), 500); // Hapus elemen setelah animasi
                    }
                }, 5000);
            </script>
        @endif
        
        <form method="POST" action="{{ route('login') }}" class="mt-4">
            @csrf
            
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                    class="w-full mt-1 px-4 py-2 border rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="w-full mt-1 px-4 py-2 border rounded-lg bg-white dark:bg-gray-700 text-gray-800 dark:text-white border-gray-300 dark:border-gray-600 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none pr-10 @error('password') border-red-500 @enderror">
                    <button type="button" onclick="togglePassword()" 
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 dark:text-gray-300">
                        <i id="toggleIcon" class="fa fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <script>
                function togglePassword() {
                    const passwordInput = document.getElementById('password');
                    const toggleIcon = document.getElementById('toggleIcon');
                    
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

            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="text-blue-600 border-gray-300 rounded">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline dark:text-blue-400">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full mt-6 bg-blue-500 text-white px-4 py-2 rounded-lg font-medium transition duration-300 hover:bg-blue-700 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none">
                Login
            </button>

            <div class="relative mt-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="bg-white dark:bg-gray-800 px-2 text-gray-600 dark:text-gray-300">Or Login with</span>
                </div>
            </div>
    
            <a href="#" class="mt-4 w-full flex items-center justify-center border border-gray-300 dark:border-gray-600 rounded-lg px-4 py-2 transition duration-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google Logo" class="w-5 h-5 mr-2">
                <span class="text-gray-700 dark:text-gray-300">Login with Google</span>
            </a>

            <p class="text-sm text-gray-600 dark:text-gray-300 text-center mt-4">
                Don't have an account? 
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline dark:text-blue-400">Sign up</a>
            </p>
        </form>
    </div>
</div>
@endsection
