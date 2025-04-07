@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="min-h-screen flex bg-gray-50">
    <!-- Desktop Sidebar -->
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
                <a href="{{ route('profile.edit') }}" class="flex items-center p-3 rounded text-gray-700 hover:bg-gray-100 transition bg-gray-100">
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
                    <h1 class="text-lg font-medium text-gray-800">Profile Settings</h1>
                </div>

                <!-- User Profile Dropdown -->
                <div class="relative">
                    <button id="profile-menu-button" class="flex items-center space-x-2 focus:outline-none group">
                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-700 text-sm font-medium group-hover:bg-gray-300 transition-colors">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="text-gray-700 hidden md:inline">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 text-gray-500 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-md shadow-lg py-1 z-10 border border-gray-100">
                        <!-- User Info -->
                        <div class="px-4 py-2 border-b border-gray-100">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 border-t border-gray-100">
                                Logout
                            </button>
                        </form>
                        
                        <!-- Menu Links -->
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile Settings</a>
                        
                        <!-- Package Info (Collapsible) -->
                        <div class="border-t border-gray-100">
                            <button id="togglePackageInfo" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                                <span>About Package</span>
                                <svg id="packageInfoIcon" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div id="packageInfoContent" class="hidden px-4 py-2 bg-gray-50 text-xs text-gray-500 space-y-1">
                                <div class="flex justify-between">
                                    <span>Version:</span>
                                    <span class="font-medium">1.x.x</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Package:</span>
                                    <span class="font-medium"><a href="https://x-blade.dev/package/xblade-ui-auth">xblade-auth/xblade-ui-auth</a></span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Developer:</span>
                                    <span class="font-medium"><a href="https://x-blade.dev">x-blade.dev</a></span>
                                </div>
                                <div class="flex justify-between items-center mt-1">
                                    <span>Instagram:</span>
                                    <a href="https://instagram.com/xblade_dev" target="_blank" class="text-blue-500 hover:underline flex items-center">
                                        @xblade_dev
                                        <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const profileButton = document.getElementById('profile-menu-button');
                        const dropdownMenu = document.getElementById('dropdownMenu');
                        const togglePackageInfo = document.getElementById('togglePackageInfo');
                        
                        // Toggle main dropdown
                        profileButton.addEventListener('click', function(e) {
                            e.stopPropagation();
                            dropdownMenu.classList.toggle('hidden');
                        });
                        
                        // Toggle package info
                        if (togglePackageInfo) {
                            togglePackageInfo.addEventListener('click', function(e) {
                                e.stopPropagation();
                                const content = document.getElementById('packageInfoContent');
                                const icon = document.getElementById('packageInfoIcon');
                                
                                content.classList.toggle('hidden');
                                icon.classList.toggle('rotate-180');
                            });
                        }
                        
                        // Close when clicking outside
                        document.addEventListener('click', function() {
                            dropdownMenu.classList.add('hidden');
                            const packageContent = document.getElementById('packageInfoContent');
                            const packageIcon = document.getElementById('packageInfoIcon');
                            
                            if (packageContent) packageContent.classList.add('hidden');
                            if (packageIcon) packageIcon.classList.remove('rotate-180');
                        });
                    });
                </script>
            </div>
        </header>

        <!-- Scrollable Profile Content -->
        <main class="flex-1 pt-16 pb-4 overflow-y-auto">
            <div class="p-4 md:p-6 max-w-3xl mx-auto space-y-6">
                <!-- Update Profile Information -->
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold mb-4">Profile Information</h2>
                    <p class="text-sm text-gray-600 mb-6">Update your account's profile information and email address.</p>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- Update Password -->
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold mb-4">Update Password</h2>
                    <p class="text-sm text-gray-600 mb-6">Ensure your account is using a long, random password to stay secure.</p>
                    @include('profile.partials.update-password-form')
                </div>

                <!-- Delete Account -->
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-lg font-semibold mb-4">Delete Account</h2>
                    <p class="text-sm text-gray-600 mb-6">Once deleted, all resources and data will be permanently removed.</p>
                    @include('profile.partials.delete-user-form')
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
                <a href="{{ route('profile.edit') }}" class="flex items-center p-3 rounded text-gray-700 hover:bg-gray-100 transition bg-gray-100">
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

    });
</script>
@endsection