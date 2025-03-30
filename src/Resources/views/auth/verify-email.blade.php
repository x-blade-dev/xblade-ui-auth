@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg p-6 shadow-lg text-center">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">Verify Your Email</h2>

        {{-- Notifikasi sukses atau error --}}
        @if (session('status') == 'verification-link-sent')
            <div id="success-alert" class="mt-4 p-3 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 border border-green-400 dark:border-green-600 rounded-lg transition-opacity duration-500">
                A new verification link has been sent to your email.
            </div>

            <script>
                setTimeout(() => {
                    const alertBox = document.getElementById('success-alert');
                    if (alertBox) {
                        alertBox.classList.add('opacity-0');
                        setTimeout(() => alertBox.remove(), 500);
                    }
                }, 5000);
            </script>
        @endif

        <p class="text-gray-600 dark:text-gray-300 mt-4">
            Please check your email for a verification link before proceeding. <br>
            If you didn’t receive the email, click the button below.
        </p>

        <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
            @csrf
            <button type="submit"
                class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg font-medium transition duration-300 hover:bg-blue-700 focus:ring focus:ring-blue-400 dark:focus:ring-blue-600 focus:outline-none">
                Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit"
                class="w-full bg-gray-500 text-white px-4 py-2 rounded-lg font-medium transition duration-300 hover:bg-gray-700 focus:ring focus:ring-gray-400 dark:focus:ring-gray-600 focus:outline-none">
                Logout
            </button>
        </form>
    </div>
</div>
@endsection
