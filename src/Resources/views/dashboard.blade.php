@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex bg-gray-50">
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-white text-gray-800 h-screen p-4 fixed md:relative transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-30">
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
    <div class="flex-1 flex flex-col transition-all duration-300">
        <!-- Navbar -->
        <header class="bg-white px-4 py-3 flex justify-between items-center -sm">
            <div class="flex items-center space-x-4">
                <button id="open-sidebar" class="md:hidden text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <h1 class="text-lg font-medium text-gray-800">Dashboard</h1>
            </div>

            <!-- Profile Dropdown -->
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
                
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md py-1 z-10 border border-gray-100">
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

        <!-- Content -->
        <main class="flex-1 p-4 md:p-6">
            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl p-6 text-white mb-6">
                <h2 class="text-2xl font-bold mb-2">Welcome back, {{ Auth::user()->name }}! 👋</h2>
                <p class="opacity-90">Here's what's happening with your account today.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-lg  p-6 transition ">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Total Visits</p>
                            <h3 class="text-2xl font-bold text-gray-800">1,234</h3>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg  p-6 transition ">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Revenue</p>
                            <h3 class="text-2xl font-bold text-gray-800">$5,678</h3>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg  p-6 transition ">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Users</p>
                            <h3 class="text-2xl font-bold text-gray-800">432</h3>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg  p-6 transition ">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Tasks</p>
                            <h3 class="text-2xl font-bold text-gray-800">12/15</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg  overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h3 class="text-lg font-medium text-gray-900">Recent Activity</h3>
                </div>
                <div class="divide-y divide-gray-100">
                    <div class="px-6 py-4 hover:bg-gray-50 transition">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">New login detected</p>
                                <p class="text-sm text-gray-500">2 hours ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 hover:bg-gray-50 transition">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Profile updated</p>
                                <p class="text-sm text-gray-500">1 day ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4 hover:bg-gray-50 transition">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">New notification</p>
                                <p class="text-sm text-gray-500">3 days ago</p>
                            </div>
                        </div>
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