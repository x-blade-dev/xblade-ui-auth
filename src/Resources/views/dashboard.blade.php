@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex bg-gray-50">
    <!-- Desktop Sidebar (fixed on large screens) -->
    <aside class="w-64 bg-white border-r border-gray-200 h-screen fixed hidden md:block z-20">
        <div class="flex flex-col h-full p-4">
            <div class="mb-8 p-2">
                <h2 class="text-xl font-semibold text-gray-800">{{ config('app.name', 'Laravel') }}</h2>
            </div>
            
            <nav class="flex-1 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded text-gray-700 hover:bg-gray-100 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center p-3 rounded text-gray-700 hover:bg-gray-100 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profile</span>
                </a>
            </nav>
            
            <div class="mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center p-3 rounded text-gray-700 hover:bg-gray-100 transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col md:ml-64">
        <!-- Fixed Top Navigation -->
        <header class="bg-white border-b border-gray-200 px-4 py-3 fixed w-full md:w-[calc(100%-16rem)] z-10">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <button id="mobile-menu-button" class="md:hidden text-gray-500 mr-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <h1 class="text-lg font-medium text-gray-800">Dashboard</h1>
                </div>

                <!-- User Profile Dropdown -->
                <div class="relative">
                    <button id="profile-menu-button" class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 text-sm font-medium">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-gray-700 hidden md:inline">{{ Auth::user()->name }}</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Scrollable Content -->
        <main class="flex-1 pt-16 pb-4 overflow-y-auto">
            <div class="p-4 md:p-6">
                <!-- Dashboard Content -->
                <div class="max-w-7xl mx-auto">
                    <!-- Welcome Card -->
                    <div class="bg-white rounded-lg border border-gray-200 p-6 mb-6">
                        <h2 class="text-xl font-semibold mb-2">Welcome back, {{ Auth::user()->name }}</h2>
                        <p class="text-gray-600">Here's what's happening with your account today.</p>
                    </div>

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white border border-gray-200 rounded-lg p-6">
                            <h3 class="text-gray-500 text-sm font-medium">Total Views</h3>
                            <p class="text-2xl font-semibold mt-1">0</p>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg p-6">
                            <h3 class="text-gray-500 text-sm font-medium">Active Users</h3>
                            <p class="text-2xl font-semibold mt-1">0</p>
                        </div>
                        <div class="bg-white border border-gray-200 rounded-lg p-6">
                            <h3 class="text-gray-500 text-sm font-medium">Conversion Rate</h3>
                            <p class="text-2xl font-semibold mt-1">0</p>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        Place your another menu here  ...
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Mobile Sidebar (Drawer) -->
    <div id="mobile-sidebar" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 transform -translate-x-full z-30 transition-transform duration-300 md:hidden">
        <div class="flex flex-col h-full p-4">
            <div class="flex justify-between items-center mb-8 p-2">
                <h2 class="text-xl font-semibold text-gray-800">{{ config('app.name', 'Laravel') }}</h2>
                <button id="close-mobile-menu" class="text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <nav class="flex-1 space-y-1">
                <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded text-gray-700 hover:bg-gray-100 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="flex items-center p-3 rounded text-gray-700 hover:bg-gray-100 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Profile</span>
                </a>
            </nav>
            
            <div class="mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center p-3 rounded text-gray-700 hover:bg-gray-100 transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Overlay for mobile menu -->
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden"></div>
</div>

<script>
    // Mobile menu toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMobileMenuButton = document.getElementById('close-mobile-menu');
        const mobileSidebar = document.getElementById('mobile-sidebar');
        const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

        function toggleMobileMenu() {
            mobileSidebar.classList.toggle('-translate-x-full');
            mobileMenuOverlay.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        }

        mobileMenuButton.addEventListener('click', toggleMobileMenu);
        closeMobileMenuButton.addEventListener('click', toggleMobileMenu);
        mobileMenuOverlay.addEventListener('click', toggleMobileMenu);

        // Profile dropdown functionality
        const profileMenuButton = document.getElementById('profile-menu-button');
        const profileDropdown = document.createElement('div');
        profileDropdown.className = 'hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-sm py-1 z-10 border border-gray-200';
        profileDropdown.innerHTML = `
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                    Logout
                </button>
            </form>
        `;
        
        profileMenuButton.parentElement.appendChild(profileDropdown);

        profileMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!profileMenuButton.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    });
</script>
@endsection