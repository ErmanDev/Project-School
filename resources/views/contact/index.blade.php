@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-sky-50 to-cyan-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center relative">
                <a href="{{ route('home') }}" class="absolute left-0 top-1/2 -translate-y-1/2 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors duration-200" title="Back to Home">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-3">Contact Us</h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">We'd love to hear from you. Send us a message below.</p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Form -->
            <div class="lg:col-span-2">
                @if (session('status'))
                    <div class="mb-6 p-4 rounded-lg bg-green-50 text-green-700 dark:bg-green-900/30 dark:text-green-300">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.store') }}" class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6 space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Your Name</label>
                            <input name="name" value="{{ old('name') }}" required class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-sky-500 focus:ring-sky-500" />
                            @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-sky-500 focus:ring-sky-500" />
                            @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Subject</label>
                        <input name="subject" value="{{ old('subject') }}" required class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-sky-500 focus:ring-sky-500" />
                        @error('subject') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                        <textarea name="message" rows="6" required class="mt-1 w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-sky-500 focus:ring-sky-500">{{ old('message') }}</textarea>
                        @error('message') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white font-semibold rounded-lg transition-colors duration-200">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Sidebar: Map and Directory -->
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow overflow-hidden">
                    @if($mapsEmbedUrl)
                        <iframe src="{{ $mapsEmbedUrl }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    @else
                        <div class="p-6 text-gray-600 dark:text-gray-400">Map is not configured.</div>
                    @endif
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow p-6">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Key Offices & Departments</h2>
                    @if($departments->isEmpty())
                        <p class="text-sm text-gray-600 dark:text-gray-400">No departments available yet.</p>
                    @else
                        <ul class="space-y-3">
                            @foreach($departments as $dept)
                                <li class="flex items-start justify-between">
                                    <div>
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $dept->name }}</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            @if($dept->email) <span>{{ $dept->email }}</span>@endif
                                            @if($dept->phone) <span class="ml-2">{{ $dept->phone }}</span>@endif
                                        </div>
                                    </div>
                                    <span class="text-sky-600 dark:text-sky-400 text-sm">View</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>

</div>
@endsection


