@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center relative">
                <a href="{{ route('home') }}" class="absolute left-0 top-1/2 -translate-y-1/2 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors duration-200" title="Back to Home">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">News & Events</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">Stay updated with the latest happenings at San Isidro College</p>
            </div>
        </div>
    </section>

    <!-- Featured News & Events -->
    @if($featuredItems->count() > 0)
        <section class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Featured</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($featuredItems as $item)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200 overflow-hidden group">
                            @if($item->featured_image)
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ $item->featured_image }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center mb-2">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $item->category === 'news' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : ($item->category === 'event' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200') }}">
                                        {{ ucfirst($item->category) }}
                                    </span>
                                    @if($item->event_date)
                                        <span class="ml-2 text-xs text-gray-500 dark:text-gray-400">
                                            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($item->event_date)->format('M d, Y') }}
                                        </span>
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $item->title }}</h3>
                                @if($item->description)
                                    <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">{{ $item->description }}</p>
                                @endif
                                <a href="{{ route('news-and-events.show', $item->slug) }}" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 font-semibold group-hover:gap-2 transition-all duration-200">
                                    Read More
                                    <svg class="w-5 h-5 ml-1 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8 py-12">
        <!-- News Section -->
        <div class="lg:col-span-2">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Latest News</h2>
            
            @if($news->count() > 0)
                <div class="space-y-6">
                    @foreach($news as $item)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200 overflow-hidden">
                            <div class="md:flex">
                                @if($item->featured_image)
                                    <div class="md:w-1/3 h-48 md:h-auto overflow-hidden">
                                        <img src="{{ $item->featured_image }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <div class="md:w-2/3 p-6">
                                    <div class="flex items-center mb-2">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">News</span>
                                        <span class="ml-3 text-sm text-gray-500 dark:text-gray-400">
                                            {{ \Carbon\Carbon::parse($item->published_at)->format('M d, Y') }}
                                        </span>
                                    </div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $item->title }}</h3>
                                    @if($item->description)
                                        <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">{{ $item->description }}</p>
                                    @endif
                                    <a href="{{ route('news-and-events.show', $item->slug) }}" class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">
                                        Read More →s
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $news->links() }}
                </div>
            @else
                <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-xl">
                    <p class="text-gray-600 dark:text-gray-400">No news available at this time.</p>
                </div>
            @endif
        </div>

        <!-- Sidebar: Upcoming Events & Announcements -->
        <div class="space-y-6">
            <!-- Upcoming Events -->
            @if($events->count() > 0)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Upcoming Events
                    </h3>
                    <div class="space-y-4">
                        @foreach($events as $event)
                            <a href="{{ route('news-and-events.show', $event->slug) }}" class="block p-4 bg-gray-50 dark:bg-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                                <div class="text-sm font-semibold text-gray-900 dark:text-white mb-1">{{ $event->title }}</div>
                                @if($event->event_date)
                                    <div class="text-xs text-gray-600 dark:text-gray-400">
                                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y h:i A') }}
                                    </div>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Announcements -->
            @if($announcements->count() > 0)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                        </svg>
                        Announcements
                    </h3>
                    <div class="space-y-3">
                        @foreach($announcements as $announcement)
                            <a href="{{ route('news-and-events.show', $announcement->slug) }}" class="block p-3 border-l-4 border-purple-500 hover:border-purple-700 transition-colors duration-200">
                                <div class="text-sm font-semibold text-gray-900 dark:text-white">{{ $announcement->title }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                    {{ \Carbon\Carbon::parse($announcement->published_at)->format('M d') }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection

