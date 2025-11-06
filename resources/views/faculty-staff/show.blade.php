@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('directory.index') }}" class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-semibold">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Directory
            </a>
            <div class="mt-6 bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg">
                <div class="flex items-start gap-6">
                    @if($person->photo_path)
                        <img src="{{ asset($person->photo_path) }}" alt="{{ $person->name }}" class="w-32 h-32 object-cover rounded-lg shadow" />
                    @else
                        <div class="w-32 h-32 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-500 text-white flex items-center justify-center text-3xl font-bold shadow">
                            {{ strtoupper(substr($person->name, 0, 1)) }}
                        </div>
                    @endif
                    <div class="flex-1">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $person->name }}</h1>
                        <p class="text-gray-700 dark:text-gray-300 mt-1">{{ ucfirst($person->type) }}{{ $person->title ? ' — '.$person->title : '' }}</p>
                        @if($person->department)
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Department:
                                <a class="text-indigo-600 dark:text-indigo-400 hover:underline" href="{{ route('directory.department', $person->department->slug) }}">
                                    {{ $person->department->name }}
                                </a>
                            </p>
                        @endif
                        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700 dark:text-gray-300">
                            @if($person->email)
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                    <div class="font-semibold">Email</div>
                                    <a href="mailto:{{ $person->email }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">{{ $person->email }}</a>
                                </div>
                            @endif
                            @if($person->phone)
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                    <div class="font-semibold">Phone</div>
                                    <div>{{ $person->phone }}</div>
                                </div>
                            @endif
                            @if($person->office_location)
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                    <div class="font-semibold">Office</div>
                                    <div>{{ $person->office_location }}</div>
                                </div>
                            @endif
                            @if($person->office_hours)
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                    <div class="font-semibold">Office Hours</div>
                                    <div>{{ $person->office_hours }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


