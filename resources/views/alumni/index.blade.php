@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-amber-50 to-orange-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center relative">
                <a href="{{ route('home') }}" class="absolute left-0 top-1/2 -translate-y-1/2 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors duration-200" title="Back to Home">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-3">Alumni Corner</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">News, reunions, and achievements of our graduates</p>
            <div class="mt-6">
                <a href="{{ $alumniSiteUrl }}" target="_blank" class="inline-flex items-center px-4 sm:px-6 py-2.5 sm:py-3 hover:bg-gray-200 text-blue-700 border-2 font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200">
                    Visit Alumni Website
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
            </div>
        </div>
    </section>

    <!-- Alumni Posts -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($alumniItems->isEmpty())
                <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-xl">
                    <p class="text-gray-600 dark:text-gray-400 text-lg">No alumni updates yet. Please check back soon.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($alumniItems as $item)
                        <a href="{{ route('news-and-events.show', $item->slug) }}" class="group bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow hover:shadow-lg transition-shadow duration-200">
                            @if($item->featured_image)
                                <img src="{{ asset($item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-40 object-cover group-hover:scale-[1.01] transition-transform duration-200" />
                            @endif
                            <div class="p-5">
                                <div class="text-xs uppercase tracking-wide text-amber-600 dark:text-amber-400 mb-1">{{ strtoupper($item->category) }}</div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white group-hover:text-amber-600 dark:group-hover:text-amber-400">{{ $item->title }}</h3>
                                @if($item->description)
                                    <p class="text-gray-600 dark:text-gray-400 mt-2 line-clamp-2">{{ Str::limit($item->description, 120) }}</p>
                                @endif
                                <div class="mt-3 text-xs text-gray-500 dark:text-gray-400">{{ optional($item->published_at)->format('M d, Y') }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $alumniItems->links() }}
                </div>
            @endif
        </div>
    </section>

</div>
@endsection


