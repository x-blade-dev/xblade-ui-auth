@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="min-h-screen flex bg-gray-50">
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-white text-gray-800 h-screen p-4 shadow-lg fixed md:relative transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-30">
        <div class="flex flex-col h-full">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">⚡ {{ config('app.name', 'Laravel') }}</h2>
                <button id="close-sidebar" class="md:hidden text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <nav class="flex-1 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition group">
                    <span class="text-xl mr-3">🏠</span>
                    <span class="group-hover:translate-x-1 transition-transform">Dashboard</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition group">
                    <span class="text-xl mr-3">👤</span>
                    <span class="group-hover:translate-x-1 transition-transform">Profile</span>
                </a>
            </nav>
            
            <div class="mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition group">
                        <span class="text-xl mr-3">🚪</span>
                        <span class="group-hover:translate-x-1 transition-transform">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <header class="bg-white px-4 py-3 flex justify-between items-center shadow-sm z-40">            
            <div class="flex items-center space-x-4">
                <button id="open-sidebar" class="md:hidden text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <h1 class="text-lg font-medium text-gray-800">Profile Settings</h1>
            </div>

            <div class="relative">
                <button onclick="toggleDropdown()" class="flex items-center space-x-2 focus:outline-none">
                    <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-sm font-medium">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <span class="text-gray-700 hidden md:inline">{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-1 z-10 border border-gray-100">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Profile Content with overflow-y-scroll -->
        <main class="flex-1 fixed w-full">
            <div class="space-y-6 h-screen overflow-y-scroll mx-4">
                <!-- Update Profile Information -->
                <div class="bg-white rounded-lg shadow overflow-hidden p-6 mt-20">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Profile Information</h3>
                        <p class="text-sm text-gray-600 mb-6">Update your account's profile information and email address.</p>
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password -->
                <div class="bg-white rounded-lg shadow overflow-hidden p-6">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Update Password</h3>
                        <p class="text-sm text-gray-600 mb-6">Ensure your account is using a long, random password to stay secure.</p>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="bg-white rounded-lg shadow overflow-hidden p-6">
                    <div class="max-w-xl">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Delete Account</h3>
                        <p class="text-sm text-gray-600 mb-6">Once deleted, all resources and data will be permanently removed.</p>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    // Mobile sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebar-overlay');
    const openSidebarBtn = document.getElementById('open-sidebar');
    const closeSidebarBtn = document.getElementById('close-sidebar');

    openSidebarBtn.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
        sidebarOverlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    });

    closeSidebarBtn.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });

    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
    });

    // Dropdown menu
    function toggleDropdown() {
        document.getElementById('dropdownMenu').classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('dropdownMenu');
        const button = document.querySelector('[onclick="toggleDropdown()"]');
        
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
@endsection