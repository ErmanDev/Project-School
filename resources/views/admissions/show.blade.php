@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="mb-4">
                <a href="{{ route('admissions.index') }}" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to All Admissions
                </a>
            </nav>
            <div class="text-center">
                @php
                    $categoryLabels = [
                        'guideline' => 'Admission Guideline',
                        'form' => 'Downloadable Form',
                        'requirement' => 'Entrance Requirement'
                    ];
                @endphp
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">{{ $categoryLabels[$document->category] }}</p>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">{{ $document->title }}</h1>
            </div>
        </div>
    </section>

    <!-- Document Details -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 mb-8">
                @if($document->description)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Overview
                        </h2>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">{{ $document->description }}</p>
                    </div>
                @endif

                @if($document->content)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Details
                        </h2>
                        <div class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">{{ $document->content }}</div>
                    </div>
                @endif

                @if($document->download_url)
                    <div class="mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 flex items-center">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Download
                        </h2>
                        <a href="{{ $document->download_url }}" target="_blank" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors duration-200">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                            </svg>
                            Download {{ $document->title }}
                        </a>
                    </div>
                @endif
            </div>

            @if($relatedDocuments->count() > 0)
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Related Documents</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($relatedDocuments as $relatedDocument)
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $relatedDocument->title }}</h3>
                                @if($relatedDocument->description)
                                    <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">{{ Str::limit($relatedDocument->description, 100) }}</p>
                                @endif
                                <a href="{{ route('admissions.show', $relatedDocument->slug) }}" class="text-indigo-600 dark:text-indigo-400 font-semibold hover:text-indigo-700 dark:hover:text-indigo-300">
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
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Have Questions About Admissions?</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Contact us for more information or assistance with the admission process.</p>
                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg transition-colors duration-200">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

