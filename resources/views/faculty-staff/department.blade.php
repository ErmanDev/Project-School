@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">{{ $department->name }}</h1>
                <p class="text-gray-600 dark:text-gray-400">
                    @if($department->email) <span>Email: {{ $department->email }}</span> @endif
                    @if($department->phone) <span class="ml-4">Phone: {{ $department->phone }}</span> @endif
                    @if($department->office_location) <span class="ml-4">Office: {{ $department->office_location }}</span> @endif
                    @if($department->office_hours) <span class="ml-4">Hours: {{ $department->office_hours }}</span> @endif
                </p>
            </div>
        </div>
    </section>

    <!-- Listings -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Academic Personnel
                    </h2>
                    <div class="space-y-4">
                        @forelse ($department->facultyAndStaff->where('type', 'academic') as $person)
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow">
                                <a href="{{ route('directory.person', $person->slug) }}" class="text-lg font-semibold text-gray-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400">{{ $person->name }}</a>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $person->title }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-600 dark:text-gray-400">No academic personnel listed.</p>
                        @endforelse
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                        <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Non-Academic Personnel
                    </h2>
                    <div class="space-y-4">
                        @forelse ($department->facultyAndStaff->where('type', 'non-academic') as $person)
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-5 shadow">
                                <a href="{{ route('directory.person', $person->slug) }}" class="text-lg font-semibold text-gray-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400">{{ $person->name }}</a>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $person->title }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-600 dark:text-gray-400">No non-academic personnel listed.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('directory.index') }}" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Directory
                </a>
            </div>
        </div>
    </section>
</div>
@endsection


