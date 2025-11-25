@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-white">
    <!-- Header and Navigation Container -->
    <div x-data="{ openDropdown: null, mobileMenuOpen: false, searchOpen: false }" class="sticky top-0 z-50">
        <!-- Header with Logo and University Name -->
        <header class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('images/png/nobg_logo.png') }}" class="w-16 h-16" alt="San Isidro College Logo" />
                        <div>
                            <h1 class="text-2xl font-bold text-blue-900">SAN ISIDRO COLLEGE</h1>
                            <p class="text-sm text-gray-600">Malaybalay City, Bukidnon 8700, Philippines</p>
                        </div>
                    </div>
                    <div class="hidden lg:flex items-center space-x-4">
                        <!-- Official seals/logos can be added here if needed -->
                    </div>
                </div>
            </div>
        </header>

        <!-- Navigation Bar -->
        <nav 
             class="bg-white shadow-lg border-b border-blue-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center lg:justify-between justify-end h-14">
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-1 lg:space-x-4">
                    <!-- Academic Programs Dropdown -->
                    <div 
                        x-data="{ open: false }"
                        @mouseenter="open = true"
                        @mouseleave="open = false"
                        class="relative">
                        <a 
                            href="#" 
                            class="px-3 py-2 text-blue-900 hover:bg-blue-50 transition-colors duration-200 text-sm lg:text-base flex items-center">
                            Academic Programs
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu -->
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="absolute top-full left-0 mt-1 w-64 bg-white rounded-md shadow-lg border border-blue-100 py-1 z-50 max-h-96 overflow-y-auto"
                            style="display: none;">
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Preschool
                            </a>
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Elementary
                            </a>
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Junior High
                            </a>
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Senior High
                            </a>
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                College
                            </a>
                            <div class="border-t border-blue-100 my-1"></div>
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Course descriptions and Curriculum outlines
                            </a>
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Admission and Graduation Requirements
                            </a>
                        </div>
                    </div>

                    <!-- Admissions Dropdown -->
                    <div 
                        x-data="{ open: false }"
                        @mouseenter="open = true"
                        @mouseleave="open = false"
                        class="relative">
                        <a 
                            href="#"
                            class="px-3 py-2 text-blue-900 hover:bg-blue-50 transition-colors duration-200 text-sm lg:text-base flex items-center cursor-pointer"
                            role="button">
                            Admissions
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu -->
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="absolute top-full left-0 mt-1 w-64 bg-white rounded-md shadow-lg border border-blue-100 py-1 z-50"
                            style="display: none;">
                            <a 
                                href="{{ route('admissions.requirements') }}" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                               Guidelines 
                            </a>
                         
                            <a 
                                href="{{ route('admissions.pre-registration') }}" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Download Requirements
                            </a>
                            <a 
                                href="{{ route('admissions.enrollment-form') }}" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                List of Requirements
                            </a>
                        </div>
                    </div>

                    <!-- News & Events Dropdown -->
                    <div 
                        x-data="{ open: false }"
                        @mouseenter="open = true"
                        @mouseleave="open = false"
                        class="relative">
                        <a 
                            href="{{ route('news-and-events.index') }}" 
                            class="px-3 py-2 text-blue-900 hover:bg-blue-50 transition-colors duration-200 text-sm lg:text-base flex items-center">
                            News & Events
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu -->
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="absolute top-full left-0 mt-1 w-64 bg-white rounded-md shadow-lg border border-blue-100 py-1 z-50"
                            style="display: none;">
                            <a 
                                href="{{ route('news-and-events.index') }}" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Latest news
                            </a>
                            <a 
                                href="{{ route('news-and-events.index') }}?view=calendar" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Calendar of Activities
                            </a>
                            <a 
                                href="{{ route('news-and-events.index') }}?view=gallery" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Gallery
                            </a>
                        </div>
                    </div>

                    <!-- Student Services Dropdown -->
                    <div 
                        x-data="{ open: false }"
                        @mouseenter="open = true"
                        @mouseleave="open = false"
                        class="relative">
                        <a 
                            href="{{ route('student-services.index') }}" 
                            class="px-3 py-2 text-blue-900 hover:bg-blue-50 transition-colors duration-200 text-sm lg:text-base flex items-center">
                            Student Services
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu -->
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="absolute top-full left-0 mt-1 w-64 bg-white rounded-md shadow-lg border border-blue-100 py-1 z-50"
                            style="display: none;">
                            @foreach($studentServiceCategories as $category)
                                <a 
                                    href="{{ $category->url }}" 
                                    class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                    {{ $category->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Faculty & Staff Dropdown -->
                    <div 
                        x-data="{ open: false }"
                        @mouseenter="open = true"
                        @mouseleave="open = false"
                        class="relative">
                        <a 
                            href="#" 
                            class="px-3 py-2 text-blue-900 hover:bg-blue-50 transition-colors duration-200 text-sm lg:text-base flex items-center">
                            Faculty & Staff
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </a>
                        <!-- Dropdown Menu -->
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="absolute top-full left-0 mt-1 w-64 bg-white rounded-md shadow-lg border border-blue-100 py-1 z-50"
                            style="display: none;">
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Academic Personnel
                            </a>
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Non-Academic Personnel
                            </a>
                            <a 
                                href="#" 
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors duration-200">
                                Departmental Details
                            </a>
                        </div>
                    </div>

                    <!-- Alumni Corner -->
                    <a href="{{ route('alumni.index') }}" class="px-3 py-2 text-blue-900 hover:bg-blue-50 transition-colors duration-200 text-sm lg:text-base">
                        Alumni
                    </a>

                    <!-- Downloads -->
                    <a href="{{ route('downloads.index') }}" class="px-3 py-2 text-blue-900 hover:bg-blue-50 transition-colors duration-200 text-sm lg:text-base">
                        Downloads
                    </a>

                    <!-- Contact Us -->
                    <a href="{{ route('contact.index') }}" class="px-3 py-2 text-blue-900 hover:bg-blue-50 transition-colors duration-200 text-sm lg:text-base">
                        Contact Us
                    </a>
                </div>

                <!-- Mobile Icons Container (Search + Hamburger) -->
                <div class="lg:hidden flex items-center justify-end space-x-2 text-blue-900">
                    <!-- Search Icon Button -->
                    <button 
                        @click="searchOpen = !searchOpen"
                        class="relative z-50 flex items-center justify-center w-10 h-10 text-blue-900 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:ring-offset-2 focus:ring-offset-white rounded-md transition-all duration-300"
                        :class="searchOpen ? 'bg-blue-50' : ''"
                        aria-label="Search">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>

                    <!-- Mobile Menu Button - Hamburger -->
                    <button 
                        @click="mobileMenuOpen = !mobileMenuOpen; openDropdown = mobileMenuOpen ? 'mobile' : null" 
                        class="relative z-50 flex flex-col items-center justify-center w-10 h-10 text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:ring-offset-2 focus:ring-offset-white rounded-md transition-all duration-300"
                        :class="mobileMenuOpen ? 'bg-blue-50' : 'hover:bg-blue-50'"
                        aria-label="Toggle mobile menu">
                        <!-- Hamburger Icon -->
                        <span class="sr-only">Open main menu</span>
                        <div class="absolute w-6 h-6 flex flex-col justify-center items-center">
                            <!-- Top line -->
                            <span 
                                class="block absolute h-0.5 w-6 bg-blue-900 transform transition-all duration-300 ease-in-out"
                                :class="mobileMenuOpen ? 'rotate-45 translate-y-0' : '-translate-y-2'">
                            </span>
                            <!-- Middle line -->
                            <span 
                                class="block absolute h-0.5 w-6 bg-blue-900 transform transition-all duration-300 ease-in-out"
                                :class="mobileMenuOpen ? 'opacity-0' : 'opacity-100'">
                            </span>
                            <!-- Bottom line -->
                            <span 
                                class="block absolute h-0.5 w-6 bg-blue-900 transform transition-all duration-300 ease-in-out"
                                :class="mobileMenuOpen ? '-rotate-45 translate-y-0' : 'translate-y-2'">
                            </span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div 
                x-show="mobileMenuOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                @click.away="mobileMenuOpen = false; openDropdown = null"
                class="lg:hidden bg-white border-t border-blue-200"
                style="display: none;">
                <div class="px-2 pt-2 pb-4 space-y-1">
                    <!-- Academic Programs with Dropdown -->
                    <div x-data="{ open: false }">
                        <button 
                            @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200 font-medium">
                            <span>Academic Programs</span>
                            <svg 
                                class="w-5 h-5 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="pl-4 space-y-1"
                            style="display: none;">
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Preschool
                            </a>
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Elementary
                            </a>
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Junior High
                            </a>
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Senior High
                            </a>
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                College
                            </a>
                            <div class="border-t border-blue-100 my-1"></div>
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Course descriptions and Curriculum outlines
                            </a>
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Admission and graduation requirements
                            </a>
                        </div>
                    </div>
                    <!-- Admissions with Dropdown -->
                    <div x-data="{ open: false }">
                        <button 
                            @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200 font-medium">
                            <span>Admissions</span>
                            <svg 
                                class="w-5 h-5 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="pl-4 space-y-1"
                            style="display: none;">
                            <a 
                                href="{{ route('admissions.requirements') }}" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Admission Requirements
                            </a>
                            <a 
                                href="{{ route('admissions.pre-registration') }}" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Pre-registration
                            </a>
                            <a 
                                href="{{ route('admissions.enrollment-form') }}" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Enrollment Form
                            </a>
                        </div>
                    </div>
                    <!-- News & Events with Dropdown -->
                    <div x-data="{ open: false }">
                        <button 
                            @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200 font-medium">
                            <span>News & Events</span>
                            <svg 
                                class="w-5 h-5 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="pl-4 space-y-1"
                            style="display: none;">
                            <a 
                                href="{{ route('news-and-events.index') }}" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Latest news
                            </a>
                            <a 
                                href="{{ route('news-and-events.index') }}?view=calendar" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Calendar of Activities
                            </a>
                            <a 
                                href="{{ route('news-and-events.index') }}?view=gallery" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Gallery
                            </a>
                        </div>
                    </div>
                    <!-- Student Services with Dropdown -->
                    <div x-data="{ open: false }">
                        <button 
                            @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200 font-medium">
                            <span>Student Services</span>
                            <svg 
                                class="w-5 h-5 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="pl-4 space-y-1"
                            style="display: none;">
                            @foreach($studentServiceCategories as $category)
                                <a 
                                    href="{{ $category->url }}" 
                                    @click="mobileMenuOpen = false; open = false"
                                    class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                    {{ $category->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Faculty & Staff with Dropdown -->
                    <div x-data="{ open: false }">
                        <button 
                            @click="open = !open"
                            class="w-full flex items-center justify-between px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200 font-medium">
                            <span>Faculty & Staff</span>
                            <svg 
                                class="w-5 h-5 transition-transform duration-200"
                                :class="open ? 'rotate-180' : ''"
                                fill="none" 
                                stroke="currentColor" 
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div 
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-1"
                            class="pl-4 space-y-1"
                            style="display: none;">
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Academic Personnel
                            </a>
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Non-Academic Personnel
                            </a>
                            <a 
                                href="#" 
                                @click="mobileMenuOpen = false; open = false"
                                class="block px-4 py-2 text-sm text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200">
                                Departmental Details
                            </a>
                        </div>
                    </div>
                    <a 
                        href="{{ route('alumni.index') }}" 
                        @click="mobileMenuOpen = false"
                        class="block px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200 font-medium">
                        Alumni
                    </a>
                    <a 
                        href="{{ route('downloads.index') }}" 
                        @click="mobileMenuOpen = false"
                        class="block px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200 font-medium">
                        Downloads
                    </a>
                    <a 
                        href="{{ route('contact.index') }}" 
                        @click="mobileMenuOpen = false"
                        class="block px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-md transition-colors duration-200 font-medium">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
        </nav>

        <!-- Search Overlay -->
            <div 
                x-show="searchOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click.away="searchOpen = false"
                @keydown.escape.window="searchOpen = false"
                class="lg:hidden fixed inset-0 bg-black bg-opacity-30 z-50"
                style="display: none;">
            <div 
                x-show="searchOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 -translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-4"
                class="bg-white shadow-xl rounded-b-lg mx-4 mt-20"
                @click.stop>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Search</h3>
                        <button 
                            @click="searchOpen = false"
                            class="text-gray-500 hover:text-gray-700 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form action="/search" method="GET" class="space-y-4">
                        <div class="relative">
                            <input 
                                type="text" 
                                name="q" 
                                placeholder="What are you looking for?" 
                                autofocus
                                class="w-full px-4 py-3 pl-12 pr-4 text-gray-900 bg-white border border-blue-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                x-ref="searchInput"
                                x-init="$watch('searchOpen', value => value && $nextTick(() => $refs.searchInput.focus()))">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <button 
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg border-2 border-white transition-colors duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Carousel Section -->
    <section class="py-0">
        <div class="w-full">
            <div class="bg-white overflow-hidden">
                <div class="relative">
                    <div class="carousel-container relative w-full h-[40vh] lg:h-[50vh] overflow-hidden">
                        @if($carouselItems->count() > 0)
                            @foreach($carouselItems as $index => $item)
                                <div class="carousel-item absolute inset-0 transition-opacity duration-[2000ms] {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" style="{{ $item->featured_image ? 'background-image: url(' . asset('storage/' . $item->featured_image) . '); background-size: cover; background-position: center; background-repeat: no-repeat;' : '' }}">
                <div class="h-full {{ $item->featured_image ? 'bg-black bg-opacity-50' : ($index === 0 ? 'bg-black bg-opacity-60' : 'bg-gradient-to-r from-blue-900 to-white') }} flex items-center justify-center" style="{{ !$item->featured_image && $index === 0 ? 'background-image: url(' . asset('images/png/sic_1.png') . '); background-size: cover; background-position: center; background-repeat: no-repeat;' : '' }}">
                                        <div class="text-center text-white p-4 sm:p-6 md:p-8">
                                            <p class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4 text-white">{{ $item->title }}</p>
                                           
                                            <p class="text-base sm:text-lg md:text-xl mb-4 sm:mb-6">{{ Str::limit($item->description ?? strip_tags($item->content), 100) }}</p>
                                            @if($item->event_date)
                                                <p class="text-sm sm:text-base md:text-lg mb-3 sm:mb-4">
                                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($item->event_date)->format('M d, Y') }}
                                                    @if($item->start_time)
                                                        {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}
                                                    @endif
                                                </p>
                                            @endif
                                            <a href="{{ route('news-and-events.show', $item->slug) }}" class="inline-block bg-gray-100 hover:bg-gray-200 text-blue-700 border-2 border-gray-300 px-4 py-2 sm:px-6 sm:py-3 rounded-lg text-sm sm:text-base font-semibold transition-colors duration-200 shadow-md hover:shadow-lg">
                                                {{ $item->category === 'event' ? 'View Event' : ($item->category === 'announcement' ? 'Read More' : 'Learn More') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Default welcome slide if no featured items -->
                            <div class="carousel-item absolute inset-0 transition-opacity duration-[2000ms] opacity-100">
                                <div class="h-full bg-black bg-opacity-80 flex items-center justify-center" style="background-image: url('{{ asset('images/png/sic_1.png') }}'); background-size: cover; background-position: center center; background-repeat: no-repeat; width: 100%; height: 100%;">
                                    <div class="text-center text-white p-4 sm:p-6 md:p-8">
                                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-4">Welcome to San Isidro College</h2>
                                        <p class="text-base sm:text-lg md:text-xl mb-4 sm:mb-6">Your comprehensive educational management system</p>
                                        <a href="{{ route('about') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white border-2 border-white px-4 py-2 sm:px-6 sm:py-3 rounded-lg text-sm sm:text-base font-semibold transition-colors duration-200 shadow-md hover:shadow-lg">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Carousel Navigation -->
                    @if($carouselItems->count() > 0)
                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                            @foreach($carouselItems as $index => $item)
                                <button class="carousel-dot w-3 h-3 rounded-full bg-white {{ $index === 0 ? 'opacity-100' : 'opacity-50' }} transition-opacity duration-200" data-slide="{{ $index }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Responsive carousel background images */
        @media (max-width: 640px) {
            .carousel-item {
                background-size: contain !important;
            }
            .carousel-item > div[style*="background-image"] {
                background-size: contain !important;
            }
        }
        @media (min-width: 641px) {
            .carousel-item {
                background-size: cover !important;
            }
            .carousel-item > div[style*="background-image"] {
                background-size: cover !important;
            }
        }
    </style>

    <!-- Upcoming Events Calendar Section -->
    @if($upcomingEvents->count() > 0)
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Upcoming Events</h2>
                <p class="text-lg text-gray-600">Stay updated with our upcoming events and activities</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($upcomingEvents->take(6) as $event)
                    <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200">
                        <div class="flex items-start space-x-4">
                            @if($event->event_date)
                                <div class="flex-shrink-0 text-center">
                                    <div class="bg-blue-600 text-white rounded-lg p-3">
                                        <div class="text-2xl font-bold">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>
                                        <div class="text-xs uppercase">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</div>
                                    </div>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    <a href="{{ route('news-and-events.show', $event->slug) }}" class="hover:text-blue-600 transition-colors">
                                        {{ $event->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                    {{ Str::limit($event->description ?? strip_tags($event->content), 80) }}
                                </p>
                                <div class="flex flex-wrap gap-2 text-xs text-gray-500">
                                    @if($event->start_time)
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                                            @if($event->end_time)
                                                - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                            @endif
                                        </span>
                                    @endif
                                    @if($event->location)
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ $event->location }}
                                        </span>
                                    @endif
                                </div>
                                @if($event->requires_registration && $event->registration_url)
                                    <a href="{{ $event->registration_url }}" target="_blank" class="mt-3 inline-block text-sm text-blue-600 hover:underline">
                                        Register Now →
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            @if($upcomingEvents->count() > 6)
                <div class="text-center mt-8">
                    <a href="{{ route('news-and-events.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg border-2 border-white transition-colors duration-200 shadow-md hover:shadow-lg">
                        View All Events
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Welcome Message Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">Message from the School President</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-8"></div>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="bg-white border border-blue-100 rounded-2xl p-4 sm:p-6 md:p-8 shadow-lg">
                    <div class="flex flex-col md:flex-row items-center md:items-start space-y-4 md:space-y-0 md:space-x-6">
                          <img src="{{ asset('images/png/nobg_logo.png') }}" class="w-20 h-20 sm:w-24 sm:h-24 flex-shrink-0" alt="Logo" />
                        <div class="flex-1 text-center md:text-left">
                            <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 mb-2 sm:mb-4">FR. VIRGILIO H. DELFIN, CPA, DBM</h3>
                            <h4 class="text-base sm:text-lg text-blue-600 mb-3 sm:mb-4">School President</h4>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed mb-4 sm:mb-6">
                                "Welcome to our educational community! At San Isidro College, we are committed to providing 
                                excellence in education and fostering an environment where every student can thrive. 
                                Our comprehensive management system ensures that students, parents, and educators 
                                have access to the tools they need for academic success."
                            </p>
                            <p class="text-sm sm:text-base text-gray-700 leading-relaxed mb-4 sm:mb-6">
                                "We believe in the power of technology to enhance learning experiences and streamline 
                                educational processes. Together, we are building a brighter future for our students."
                            </p>
                            <a href="{{ route('about') }}" class="inline-flex items-center px-4 sm:px-6 py-2.5 sm:py-3  hover:bg-gray-200 text-blue-700 border-2  text-sm sm:text-base font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                                Learn More About Us
                               
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Published Announcements Section -->
    @if($announcements->count() > 0)
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Latest Announcements</h2>
                <p class="text-lg text-gray-600">Stay informed with our latest updates and important notices</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($announcements as $announcement)
                    <div class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 border-l-4 border-blue-500">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                                <span class="text-xs font-semibold text-blue-600 uppercase">Announcement</span>
                            </div>
                            @if($announcement->published_at)
                                <span class="text-xs text-gray-500">
                                    {{ \Carbon\Carbon::parse($announcement->published_at)->format('M d, Y') }}
                                </span>
                            @endif
                        </div>
                        
                        @if($announcement->featured_image)
                            <div class="mb-4 rounded-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $announcement->featured_image) }}" alt="{{ $announcement->title }}" class="w-full h-48 object-cover">
                            </div>
                        @endif
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3">
                            <a href="{{ route('news-and-events.show', $announcement->slug) }}" class="hover:text-blue-600 transition-colors">
                                {{ $announcement->title }}
                            </a>
                        </h3>
                        
                        @if($announcement->description)
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ $announcement->description }}
                            </p>
                        @else
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($announcement->content), 150) }}
                            </p>
                        @endif
                        
                        @if($announcement->event_date)
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ \Carbon\Carbon::parse($announcement->event_date)->format('M d, Y') }}
                                @if($announcement->start_time)
                                    at {{ \Carbon\Carbon::parse($announcement->start_time)->format('h:i A') }}
                                @endif
                            </div>
                        @endif
                        
                        <a href="{{ route('news-and-events.show', $announcement->slug) }}" class="inline-flex items-center px-4 py-2  hover:bg-gray-200 text-blue-700 border-2  font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg group">
                            Read More →
                        </a>
                    </div>
                @endforeach
            </div>
            
            @if($announcements->count() >= 6)
                <div class="text-center mt-8">
                    <a href="{{ route('news-and-events.index') }}" class="inline-flex items-center px-6 py-3  hover:bg-gray-200 text-blue-700 border-2  font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                        View All Announcements
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>
    @endif

    <!-- Academic Highlights Section -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Academic Highlights & Achievements</h2>
                <p class="text-lg text-gray-600">Celebrating our students' success and institutional excellence</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Achievements Grid -->
                <div class="space-y-6">
                    <div class="bg-white border border-blue-100 rounded-xl p-6 shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Academic Excellence</h3>
                                <p class="text-gray-600">95% graduation rate</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white border border-blue-100 rounded-xl p-6 shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">STEM Programs</h3>
                                <p class="text-gray-600">Award-winning science programs</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white border border-blue-100 rounded-xl p-6 shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">Scholarships</h3>
                                <p class="text-gray-600">$2M+ in financial aid awarded</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Statistics -->
                <div class="bg-white border border-blue-100 rounded-xl p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">By the Numbers</h3>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-2">2,500+</div>
                            <div class="text-gray-600">Students</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-2">150+</div>
                            <div class="text-gray-600">Faculty</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-2">25</div>
                            <div class="text-gray-600">Programs</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-2">98%</div>
                            <div class="text-gray-600">Satisfaction</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white text-blue-900 border-t border-blue-100 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">San Isidro College</h3>
                <p class="text-blue-700 mb-4">Empowering education through technology</p>
                <div class="flex justify-center space-x-6">
                    <a href="{{ route('about') }}" class="text-blue-600 hover:text-blue-900 transition-colors duration-200">About</a>
                    <a href="#" class="text-blue-600 hover:text-blue-900 transition-colors duration-200">Contact</a>
                    <a href="#" class="text-blue-600 hover:text-blue-900 transition-colors duration-200">Privacy</a>
                    <a href="#" class="text-blue-600 hover:text-blue-900 transition-colors duration-200">Terms</a>
                </div>
                <p class="text-blue-500 mt-6">&copy; {{ date('Y') }} San Isidro College. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>

<!-- Carousel JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carouselItems = document.querySelectorAll('.carousel-item');
    const carouselDots = document.querySelectorAll('.carousel-dot');
    
    if (carouselItems.length > 0) {
        let currentSlide = 0;
        
        function showSlide(index) {
            carouselItems.forEach((item, i) => {
                item.style.opacity = i === index ? '1' : '0';
            });
            
            carouselDots.forEach((dot, i) => {
                dot.style.opacity = i === index ? '1' : '0.5';
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % carouselItems.length;
            showSlide(currentSlide);
        }
        
        // Auto-advance carousel every 5 seconds
        setInterval(nextSlide, 5000);
        
        // Add click handlers to dots
        carouselDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });
    }
});
</script>
@endsection
