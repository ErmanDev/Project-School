@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center relative">
                <a href="{{ route('home') }}" class="absolute left-0 top-1/2 -translate-y-1/2 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors duration-200" title="Back to Home">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-3">Faculty & Staff Directory</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">Browse departments and find academic and non-academic personnel</p>
            </div>
        </div>
    </section>

    <!-- Departments & People -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($departments as $department)
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <a href="{{ route('directory.department', $department->slug) }}" class="text-2xl font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                                    {{ $department->name }}
                                </a>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    @if($department->office_location) <span>Office: {{ $department->office_location }}</span> @endif
                                    @if($department->office_hours) <span class="ml-2">Hours: {{ $department->office_hours }}</span> @endif
                                </p>
                            </div>
                        </div>

                        @if($department->facultyAndStaff->count())
                            <ul class="divide-y divide-gray-100 dark:divide-gray-700">
                                @foreach ($department->facultyAndStaff->take(4) as $person)
                                    <li class="py-3 flex items-start justify-between">
                                        <div>
                                            <a href="{{ route('directory.person', $person->slug) }}" class="font-semibold text-gray-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400">
                                                {{ $person->name }}
                                            </a>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ ucfirst($person->type) }}{{ $person->title ? ' • '.$person->title : '' }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            @if($department->facultyAndStaff->count() > 4)
                                <a href="{{ route('directory.department', $department->slug) }}" class="inline-flex items-center mt-4 text-indigo-600 dark:text-indigo-400 font-semibold hover:gap-2 transition-all duration-200">
                                    View all in {{ $department->name }}
                                    <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </a>
                            @endif
                        @else
                            <p class="text-sm text-gray-600 dark:text-gray-400">No personnel listed yet.</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
@endsection



