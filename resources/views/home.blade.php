@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Featured Carousel Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
                <div class="relative">
                    <div class="carousel-container relative h-96 overflow-hidden">
                        @if($carouselItems->count() > 0)
                            @foreach($carouselItems as $index => $item)
                                <div class="carousel-item absolute inset-0 transition-opacity duration-1000 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}" style="{{ $item->featured_image ? 'background-image: url(' . asset('storage/' . $item->featured_image) . '); background-size: cover; background-position: center;' : '' }}">
                                    <div class="h-full {{ $item->featured_image ? 'bg-black bg-opacity-50' : 'bg-gradient-to-r from-blue-600 to-purple-600' }} flex items-center justify-center">
                                        <div class="text-center text-white p-8">
                                            <h2 class="text-4xl font-bold mb-4">{{ $item->title }}</h2>
                                            <p class="text-xl mb-6">{{ Str::limit($item->description ?? strip_tags($item->content), 100) }}</p>
                                            @if($item->event_date)
                                                <p class="text-lg mb-4">
                                                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($item->event_date)->format('M d, Y') }}
                                                    @if($item->start_time)
                                                        {{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') }}
                                                    @endif
                                                </p>
                                            @endif
                                            <a href="{{ route('news-and-events.show', $item->slug) }}" class="inline-block bg-white {{ $item->category === 'event' ? 'text-green-600 hover:bg-green-50' : ($item->category === 'announcement' ? 'text-orange-600 hover:bg-orange-50' : 'text-blue-600 hover:bg-blue-50') }} px-6 py-3 rounded-lg font-semibold transition-colors duration-200">
                                                {{ $item->category === 'event' ? 'View Event' : ($item->category === 'announcement' ? 'Read More' : 'Learn More') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- Default welcome slide if no featured items -->
                            <div class="carousel-item absolute inset-0 transition-opacity duration-1000 opacity-100">
                                <div class="h-full bg-gradient-to-r from-blue-600 to-purple-600 flex items-center justify-center">
                                    <div class="text-center text-white p-8">
                                        <h2 class="text-4xl font-bold mb-4">Welcome to San Isidro College</h2>
                                        <p class="text-xl mb-6">Your comprehensive educational management system</p>
                                        <a href="{{ route('about') }}" class="inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200">
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

    <!-- Upcoming Events Calendar Section -->
    @if($upcomingEvents->count() > 0)
    <section class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Upcoming Events</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">Stay updated with our upcoming events and activities</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($upcomingEvents->take(6) as $event)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200">
                        <div class="flex items-start space-x-4">
                            @if($event->event_date)
                                <div class="flex-shrink-0 text-center">
                                    <div class="bg-indigo-600 text-white rounded-lg p-3">
                                        <div class="text-2xl font-bold">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</div>
                                        <div class="text-xs uppercase">{{ \Carbon\Carbon::parse($event->event_date)->format('M') }}</div>
                                    </div>
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                    <a href="{{ route('news-and-events.show', $event->slug) }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                                        {{ $event->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
                                    {{ Str::limit($event->description ?? strip_tags($event->content), 80) }}
                                </p>
                                <div class="flex flex-wrap gap-2 text-xs text-gray-500 dark:text-gray-400">
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
                                    <a href="{{ $event->registration_url }}" target="_blank" class="mt-3 inline-block text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
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
                    <a href="{{ route('news-and-events.index') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors duration-200">
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
    <section class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Message from the School President</h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto mb-8"></div>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-8 shadow-lg">
                    <div class="flex items-start space-x-6">
                          <img src="{{ asset('images/png/nobg_logo.png') }}" class="w-24 h-24" alt="Logo" />
                        <div class="flex-1">
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Dr. John Peterson</h3>
                            <h4 class="text-lg text-indigo-600 dark:text-indigo-400 mb-4">School President</h4>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                                "Welcome to our educational community! At San Isidro College, we are committed to providing 
                                excellence in education and fostering an environment where every student can thrive. 
                                Our comprehensive management system ensures that students, parents, and educators 
                                have access to the tools they need for academic success."
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                                "We believe in the power of technology to enhance learning experiences and streamline 
                                educational processes. Together, we are building a brighter future for our students."
                            </p>
                            <a href="{{ route('about') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors duration-200">
                                Learn More About Us
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Access Links Section -->
    <section class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Quick Access</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">Navigate to important sections quickly</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Quick Link 1 -->
                <a href="{{ route('academic-programs.index') }}" class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 group">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-blue-200 dark:group-hover:bg-blue-800 transition-colors duration-200">
                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Academic Programs</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Explore our programs</p>
                    </div>
                </a>
                
                <!-- Quick Link 5 -->
                <a href="{{ route('directory.index') }}" class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 group">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-indigo-200 dark:group-hover:bg-indigo-800 transition-colors duration-200">
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M16 11V7a4 4 0 10-8 0v4M5 11h14v10H5V11z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Faculty & Staff Directory</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Find departments and personnel</p>
                    </div>
                </a>

                <!-- Quick Link 6 -->
                <a href="{{ route('alumni.index') }}" class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 group">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-amber-100 dark:bg-amber-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-amber-200 dark:group-hover:bg-amber-800 transition-colors duration-200">
                            <svg class="w-8 h-8 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 19h14M7 15h10" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Alumni Corner</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Reunions, achievements, and more</p>
                    </div>
                </a>

                <!-- Quick Link 7 -->
                <a href="{{ route('contact.index') }}" class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 group">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-sky-100 dark:bg-sky-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-sky-200 dark:group-hover:bg-sky-800 transition-colors duration-200">
                            <svg class="w-8 h-8 text-sky-600 dark:text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Contact Us</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Send a message or find us</p>
                    </div>
                </a>
                
                <!-- Quick Link 2 -->
                <a href="{{ route('admissions.index') }}" class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 group">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-green-200 dark:group-hover:bg-green-800 transition-colors duration-200">
                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Admissions</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Application forms and guidelines</p>
                    </div>
                </a>
                
                <!-- Quick Link 3 -->
                <a href="{{ route('news-and-events.index') }}" class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 group">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-200 dark:group-hover:bg-purple-800 transition-colors duration-200">
                            <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">News & Events</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Latest campus news and activities</p>
                    </div>
                </a>
                
                <!-- Quick Link 4 -->
                <a href="{{ route('student-services.index') }}" class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 group">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-200 dark:group-hover:bg-orange-800 transition-colors duration-200">
                            <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Student Services</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Support and resources</p>
                    </div>
                </a>
                
                <!-- Quick Link 8 - Downloads -->
                <a href="{{ route('downloads.index') }}" class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 group">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-pink-100 dark:bg-pink-900 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-pink-200 dark:group-hover:bg-pink-800 transition-colors duration-200">
                            <svg class="w-8 h-8 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Downloads</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Calendars, forms & policies</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Published Announcements Section -->
    @if($announcements->count() > 0)
    <section class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Latest Announcements</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">Stay informed with our latest updates and important notices</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($announcements as $announcement)
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 border-l-4 border-purple-500">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                                <span class="text-xs font-semibold text-purple-600 dark:text-purple-400 uppercase">Announcement</span>
                            </div>
                            @if($announcement->published_at)
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($announcement->published_at)->format('M d, Y') }}
                                </span>
                            @endif
                        </div>
                        
                        @if($announcement->featured_image)
                            <div class="mb-4 rounded-lg overflow-hidden">
                                <img src="{{ asset('storage/' . $announcement->featured_image) }}" alt="{{ $announcement->title }}" class="w-full h-48 object-cover">
                            </div>
                        @endif
                        
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                            <a href="{{ route('news-and-events.show', $announcement->slug) }}" class="hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                                {{ $announcement->title }}
                            </a>
                        </h3>
                        
                        @if($announcement->description)
                            <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                                {{ $announcement->description }}
                            </p>
                        @else
                            <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($announcement->content), 150) }}
                            </p>
                        @endif
                        
                        @if($announcement->event_date)
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ \Carbon\Carbon::parse($announcement->event_date)->format('M d, Y') }}
                                @if($announcement->start_time)
                                    at {{ \Carbon\Carbon::parse($announcement->start_time)->format('h:i A') }}
                                @endif
                            </div>
                        @endif
                        
                        <a href="{{ route('news-and-events.show', $announcement->slug) }}" class="inline-flex items-center text-purple-600 dark:text-purple-400 font-semibold hover:underline group">
                            Read More
                            <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
            
            @if($announcements->count() >= 6)
                <div class="text-center mt-8">
                    <a href="{{ route('news-and-events.index') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition-colors duration-200">
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
    <section class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Academic Highlights & Achievements</h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">Celebrating our students' success and institutional excellence</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Achievements Grid -->
                <div class="space-y-6">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-xl p-6 shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Academic Excellence</h3>
                                <p class="text-gray-600 dark:text-gray-400">95% graduation rate</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-gray-700 dark:to-gray-600 rounded-xl p-6 shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">STEM Programs</h3>
                                <p class="text-gray-600 dark:text-gray-400">Award-winning science programs</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-purple-50 to-violet-50 dark:from-gray-700 dark:to-gray-600 rounded-xl p-6 shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Scholarships</h3>
                                <p class="text-gray-600 dark:text-gray-400">$2M+ in financial aid awarded</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Statistics -->
                <div class="bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-gray-700 dark:to-gray-600 rounded-xl p-8 shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">By the Numbers</h3>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">2,500+</div>
                            <div class="text-gray-600 dark:text-gray-400">Students</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">150+</div>
                            <div class="text-gray-600 dark:text-gray-400">Faculty</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">25</div>
                            <div class="text-gray-600 dark:text-gray-400">Programs</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">98%</div>
                            <div class="text-gray-600 dark:text-gray-400">Satisfaction</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 dark:bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">San Isidro College</h3>
                <p class="text-gray-400 mb-4">Empowering education through technology</p>
                <div class="flex justify-center space-x-6">
                    <a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors duration-200">About</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Contact</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Privacy</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">Terms</a>
                </div>
                <p class="text-gray-500 mt-6">&copy; {{ date('Y') }} San Isidro College. All rights reserved.</p>
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
