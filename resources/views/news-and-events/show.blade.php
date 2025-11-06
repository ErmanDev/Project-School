@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="mb-4">
                <a href="{{ route('news-and-events.index') }}" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to News & Events
                </a>
            </nav>
            <div class="text-center">
                <span class="px-4 py-2 text-sm font-semibold rounded-full {{ $item->category === 'news' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : ($item->category === 'event' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200') }}">
                    {{ ucfirst($item->category) }}
                </span>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 mt-4">{{ $item->title }}</h1>
                @if($item->published_at)
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        {{ \Carbon\Carbon::parse($item->published_at)->format('F d, Y') }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    @if($item->featured_image)
        <section class="py-8">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <img src="{{ $item->featured_image }}" alt="{{ $item->title }}" class="w-full rounded-xl shadow-xl">
            </div>
        </section>
    @endif

    <!-- Content -->
    <section class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 mb-8">
                @if($item->description)
                    <div class="mb-8">
                        <p class="text-xl text-gray-700 dark:text-gray-300 leading-relaxed">{{ $item->description }}</p>
                    </div>
                @endif

                @if($item->content)
                    <div class="prose dark:prose-invert max-w-none">
                        <div class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $item->content }}</div>
                    </div>
                @endif

                @if($item->event_date)
                    <div class="mt-8 p-6 bg-gray-50 dark:bg-gray-700 rounded-xl">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Event Details</h3>
                        <div class="flex items-center text-gray-700 dark:text-gray-300">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <div class="font-semibold">{{ \Carbon\Carbon::parse($item->event_date)->format('l, F d, Y') }}</div>
                                <div class="text-sm">{{ \Carbon\Carbon::parse($item->event_date)->format('h:i A') }}</div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Gallery -->
            @if($item->gallery_images && count($item->gallery_images) > 0)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Gallery
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($item->gallery_images as $image)
                            <div class="overflow-hidden rounded-lg">
                                <img src="{{ $image }}" alt="{{ $item->title }}" class="w-full h-48 object-cover hover:scale-110 transition-transform duration-300">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Video -->
            @if($item->youtube_url)
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        Video
                    </h2>
                    <div class="aspect-video">
                        <iframe src="{{ $item->youtube_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full rounded-lg"></iframe>
                    </div>
                </div>
            @endif

            <!-- Related Items -->
            @if($relatedItems->count() > 0)
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Related {{ ucfirst($item->category) }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedItems as $relatedItem)
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-200 overflow-hidden">
                                @if($relatedItem->featured_image)
                                    <div class="h-40 overflow-hidden">
                                        <img src="{{ $relatedItem->featured_image }}" alt="{{ $relatedItem->title }}" class="w-full h-full object-cover">
                                    </div>
                                @endif
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $relatedItem->title }}</h3>
                                    @if($relatedItem->description)
                                        <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-2">{{ $relatedItem->description }}</p>
                                    @endif
                                    <a href="{{ route('news-and-events.show', $relatedItem->slug) }}" class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline text-sm mt-2 block">
                                        Read More →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Stay Updated</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Follow us to get the latest news and events.</p>
                <div class="flex justify-center space-x-4">
                    <a href="{{ route('news-and-events.index') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        View All News & Events
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

