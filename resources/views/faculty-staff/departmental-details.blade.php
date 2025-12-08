@extends('layouts.guest')

@section('slot')
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-700 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white relative">
                <a href="{{ route('home') }}" class="absolute left-0 top-1/2 -translate-y-1/2 text-white hover:text-white transition-colors duration-200" title="Back to Home">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <p class="text-4xl md:text-5xl font-bold mb-4 text-white">Departmental Details</p>
                <p class="text-xl text-blue-100">Explore Our Academic Departments</p>
            </div>
        </div>
    </section>

    <!-- Departments Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Our Departments</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-8"></div>
                <p class="text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Each department at San Isidro College is committed to providing quality education and fostering 
                    academic excellence in their respective fields of study.
                </p>
            </div>

            @if($allDepartments->isEmpty())
                <div class="text-center py-12">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <p class="text-gray-600 dark:text-gray-300 text-lg">No departments found at this time.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($allDepartments as $department)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="mb-6">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $department->name }}</h3>
                                <div class="w-16 h-1 bg-blue-600 mb-4"></div>
                                @if(isset($department->description))
                                    <p class="text-gray-600 dark:text-gray-300 mb-6">{{ $department->description }}</p>
                                @endif
                            </div>

                            <!-- Department Information -->
                            <div class="space-y-4">
                                @if(isset($department->office_location))
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-gray-900 dark:text-white">Office Location</p>
                                            <p class="text-gray-600 dark:text-gray-300">{{ $department->office_location }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if(isset($department->office_hours))
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-gray-900 dark:text-white">Office Hours</p>
                                            <p class="text-gray-600 dark:text-gray-300 whitespace-pre-line">{{ $department->office_hours }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if(isset($department->email))
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-gray-900 dark:text-white">Email</p>
                                            <a href="mailto:{{ $department->email }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                                {{ $department->email }}
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if(isset($department->phone))
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 mr-3 mt-0.5 text-blue-600 dark:text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-semibold text-gray-900 dark:text-white">Phone</p>
                                            <a href="tel:{{ $department->phone }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                                {{ $department->phone }}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Personnel Count -->
                            @if(isset($department->facultyAndStaff) && $department->facultyAndStaff->isNotEmpty())
                                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">
                                        <span class="font-semibold">{{ $department->facultyAndStaff->count() }}</span> 
                                        {{ $department->facultyAndStaff->count() === 1 ? 'member' : 'members' }} in this department
                                    </p>
                                    <div class="flex flex-wrap gap-2">
                                        @php
                                            $academicCount = $department->facultyAndStaff->where('type', 'academic')->count();
                                            $nonAcademicCount = $department->facultyAndStaff->where('type', 'non-academic')->count();
                                        @endphp
                                        @if($academicCount > 0)
                                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-xs font-medium">
                                                {{ $academicCount }} Academic
                                            </span>
                                        @endif
                                        @if($nonAcademicCount > 0)
                                            <span class="px-3 py-1 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full text-xs font-medium">
                                                {{ $nonAcademicCount }} Non-Academic
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
@endsection








