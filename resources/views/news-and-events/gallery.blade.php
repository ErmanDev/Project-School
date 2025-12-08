@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
    <!-- Header Section -->
    <section class="py-12 bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <a href="{{ route('news-and-events.index') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to News & Events
                </a>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 text-center flex-1">
                    Gallery
                </h1>
                <div class="w-24"></div>
            </div>
            <p class="mt-4 text-center text-gray-600 max-w-2xl mx-auto">
                Visual highlights from our latest news and events at San Isidro College.
            </p>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($galleryItems->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($galleryItems as $item)
                        <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-200 overflow-hidden group">
                            <div class="relative h-48 bg-gray-100 flex items-center justify-center">
                                @if($item->featured_image)
                                    <img 
                                        src="{{ $item->featured_image }}" 
                                        alt="{{ $item->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                @else
                                    <div class="flex flex-col items-center justify-center text-gray-400">
                                        <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 19h18M5 5v14m14-14v14M9 9l2 2-2 2m4-4l2 2-2 2"></path>
                                        </svg>
                                        <span class="text-xs uppercase tracking-wide">
                                            No image available
                                        </span>
                                    </div>
                                @endif
                                @if($item->category)
                                    <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-xs font-semibold 
                                        {{ $item->category === 'news' ? 'bg-blue-100 text-blue-800' : ($item->category === 'event' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800') }}">
                                        {{ ucfirst($item->category) }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-5 flex flex-col h-full">
                                <h2 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                    {{ $item->title }}
                                </h2>
                                @if($item->description)
                                    <p class="text-sm text-gray-600 mb-3 line-clamp-3">
                                        {{ $item->description }}
                                    </p>
                                @endif
                                @if($item->event_date)
                                    <p class="text-xs text-gray-500 mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($item->event_date)->format('M d, Y') }}
                                    </p>
                                @endif
                                <div class="mt-auto pt-2">
                                    <a 
                                        href="{{ route('news-and-events.show', $item->slug) }}" 
                                        class="inline-flex items-center text-indigo-600 hover:text-indigo-800 text-sm font-semibold">
                                        View details
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-xl shadow-md p-8 text-center">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">
                        No gallery items available yet
                    </h2>
                    <p class="text-gray-600">
                        Please check back soon for photos and highlights from our news and events.
                    </p>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection


