@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="mb-4">
                <a href="{{ route('student-services.index') }}" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to All Services
                </a>
            </nav>
            <div class="text-center">
                @php
                    $categoryLabels = [
                        'guidance' => 'Guidance & Counseling',
                        'library' => 'Library & Resources',
                        'organizations' => 'Student Organizations'
                    ];
                @endphp
                <span class="px-4 py-2 text-sm font-semibold rounded-full {{ $service->category === 'guidance' ? 'bg-amber-100 text-amber-800 dark:bg-amber-900 dark:text-amber-200' : ($service->category === 'library' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' : 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200') }}">
                    {{ $categoryLabels[$service->category] }}
                </span>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 mt-4">{{ $service->title }}</h1>
            </div>
        </div>
    </section>

    <!-- Service Details -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 mb-8">
                @if($service->description)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Overview
                        </h2>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $service->description }}</p>
                    </div>
                @endif

                @if($service->content)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Details
                        </h2>
                        <div class="prose dark:prose-invert max-w-none">
                            <div class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $service->content }}</div>
                        </div>
                    </div>
                @endif

                <!-- Service Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    @if($service->location)
                        <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-xl">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 flex items-center">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Location
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $service->location }}</p>
                        </div>
                    @endif

                    @if($service->hours)
                        <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-xl">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 flex items-center">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Hours
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $service->hours }}</p>
                        </div>
                    @endif
                </div>

                @if($service->contact_info)
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            Contact Information
                        </h3>
                        <div class="p-6 bg-gray-50 dark:bg-gray-700 rounded-xl">
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-line">{{ $service->contact_info }}</p>
                        </div>
                    </div>
                @endif

                @if($service->website_url)
                    <div class="mb-8">
                        <a href="{{ $service->website_url }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors duration-200">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            Visit Website
                        </a>
                    </div>
                @endif
            </div>

            <!-- Related Services -->
            @if($relatedServices->count() > 0)
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Related Services</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($relatedServices as $relatedService)
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $relatedService->title }}</h3>
                                @if($relatedService->description)
                                    <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">{{ $relatedService->description }}</p>
                                @endif
                                <a href="{{ route('student-services.show', $relatedService->slug) }}" class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">
                                    View Details →
                                </a>
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
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Need More Help?</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Contact us for additional assistance and support.</p>
                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors duration-200">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

