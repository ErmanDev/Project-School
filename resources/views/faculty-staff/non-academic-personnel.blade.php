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
                <p class="text-4xl md:text-5xl font-bold mb-4 text-white">Non-Academic Personnel</p>
                <p class="text-xl text-blue-100">Meet Our Support Staff</p>
            </div>
        </div>
    </section>

    <!-- Non-Academic Personnel Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Our Non-Academic Personnel</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mb-8"></div>
                <p class="text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Our dedicated support staff play a crucial role in ensuring the smooth operation of our institution. 
                    They provide essential administrative, technical, and operational support to our academic community.
                </p>
            </div>

            @if($nonAcademicPersonnel->isEmpty())
                <div class="text-center py-12">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <p class="text-gray-600 dark:text-gray-300 text-lg">No non-academic personnel found at this time.</p>
                </div>
            @else
                <!-- Group by Department -->
                @foreach($allDepartments as $department)
                    @php
                        $departmentPersonnel = $nonAcademicPersonnel->filter(function($person) use ($department) {
                            return (isset($person->department) && $person->department->id === $department->id) || 
                                   (isset($person->department_id) && $person->department_id === $department->id);
                        });
                    @endphp

                    @if($departmentPersonnel->isNotEmpty())
                        <div class="mb-16">
                            <div class="mb-8">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $department->name }}</h3>
                                <div class="w-16 h-1 bg-blue-600 mb-4"></div>
                                @if(isset($department->description))
                                    <p class="text-gray-600 dark:text-gray-300">{{ $department->description }}</p>
                                @endif
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                @foreach($departmentPersonnel as $person)
                                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                                        <div class="text-center">
                                            <!-- Photo or Placeholder -->
                                            <div class="w-32 h-32 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-gray-200 dark:border-gray-600">
                                                @if($person->photo_path)
                                                    <img src="{{ asset('storage/' . $person->photo_path) }}" alt="{{ $person->name }}" class="w-full h-full rounded-full object-cover">
                                                @else
                                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                            
                                            <!-- Name and Title -->
                                            <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">{{ $person->name }}</h4>
                                            <p class="text-blue-600 dark:text-blue-400 font-medium mb-4">{{ $person->position ?? $person->title }}</p>

                                            <!-- Contact Information -->
                                            <div class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                                                @if(isset($person->email))
                                                    <div class="flex items-center justify-center">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                        </svg>
                                                        <a href="mailto:{{ $person->email }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                                            {{ $person->email }}
                                                        </a>
                                                    </div>
                                                @endif

                                                @if(isset($person->phone))
                                                    <div class="flex items-center justify-center">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                        </svg>
                                                        <a href="tel:{{ $person->phone }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
                                                            {{ $person->phone }}
                                                        </a>
                                                    </div>
                                                @endif

                                                @if(isset($person->office_location))
                                                    <div class="flex items-start justify-center">
                                                        <svg class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                        <span class="text-center">{{ $person->office_location }}</span>
                                                    </div>
                                                @endif

                                                @if(isset($person->office_hours))
                                                    <div class="flex items-start justify-center pt-2">
                                                        <svg class="w-4 h-4 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span class="text-center whitespace-pre-line">{{ $person->office_hours }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>
</div>
@endsection








