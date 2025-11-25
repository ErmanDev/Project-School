@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <section class="py-12 bg-white dark:bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center relative">
                <a href="{{ route('home') }}" class="absolute left-0 top-1/2 -translate-y-1/2 text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors duration-200" title="Back to Home">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Downloads
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400">Access academic calendars, policies, and school forms</p>
            </div>
        </div>
    </section>

    <!-- Calendar Section -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8" 
                 x-data="calendarComponent()" 
                 x-init="init()">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 gap-4">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Academic Calendar
                    </h2>
                    <div class="flex items-center space-x-2 md:space-x-4 w-full md:w-auto">
                        <button @click="previousMonth()" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200" title="Previous month">
                            <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <span class="text-base md:text-lg font-semibold text-gray-900 dark:text-white flex-1 md:min-w-[180px] text-center" x-text="monthYear"></span>
                        <button @click="nextMonth()" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200" title="Next month">
                            <svg class="w-5 h-5 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                        <button @click="goToToday()" class="px-3 md:px-4 py-2 text-xs md:text-sm bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-colors duration-200">
                            Today
                        </button>
                    </div>
                </div>

                <!-- Calendar Grid -->
                <div class="grid grid-cols-7 gap-2 mb-4">
                    <template x-for="(day, index) in weekDays" :key="index">
                        <div class="text-center text-sm font-semibold text-gray-600 dark:text-gray-400 py-2" x-text="day"></div>
                    </template>
                </div>

                <div class="grid grid-cols-7 gap-2">
                    <template x-for="(week, weekIndex) in calendarDays" :key="weekIndex">
                        <template x-for="(day, dayIndex) in week" :key="dayIndex">
                            <div 
                                @click="selectDate(day)"
                                :class="[
                                    'relative p-3 rounded-lg text-center cursor-pointer transition-all duration-200',
                                    day.isCurrentMonth ? 'bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white hover:bg-indigo-50 dark:hover:bg-indigo-900' : 'bg-gray-100 dark:bg-gray-800 text-gray-400 dark:text-gray-600',
                                    day.isToday ? 'ring-2 ring-indigo-500 dark:ring-indigo-400 font-bold' : '',
                                    day.isSelected ? 'bg-indigo-600 dark:bg-indigo-500 text-white' : ''
                                ]"
                                :title="day.events && day.events.length > 0 ? day.events.length + ' event(s)' : ''">
                                <div x-text="day.date"></div>
                                <template x-if="day.events && day.events.length > 0">
                                    <div class="flex justify-center mt-1 space-x-1">
                                        <template x-for="(event, eventIndex) in day.events.slice(0, 3)" :key="eventIndex">
                                            <div class="w-1.5 h-1.5 rounded-full bg-indigo-500 dark:bg-indigo-400"></div>
                                        </template>
                                        <template x-if="day.events.length > 3">
                                            <div class="text-xs text-indigo-600 dark:text-indigo-400" x-text="'+' + (day.events.length - 3)"></div>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </template>
                </div>

                <!-- Events List (for selected date) -->
                <div x-show="selectedDateEvents.length > 0" x-transition class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Events on <span x-text="selectedDateText"></span>
                    </h3>
                    <div class="space-y-3">
                        <template x-for="(event, index) in selectedDateEvents" :key="index">
                            <div class="flex items-start p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                <div class="flex-shrink-0 w-12 h-12 bg-indigo-600 dark:bg-indigo-500 rounded-lg flex items-center justify-center text-white font-semibold">
                                    <span x-text="event.date.getDate()"></span>
                                </div>
                                <div class="ml-4 flex-1">
                                    <h4 class="text-base font-semibold text-gray-900 dark:text-white" x-text="event.title"></h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1" x-text="event.description"></p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Downloads by Category -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @foreach($downloads as $category => $categoryDownloads)
                <div class="mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        @if($category === 'Academic Calendar')
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        @elseif($category === 'Policies')
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        @else
                            <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        @endif
                        {{ $category }}
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($categoryDownloads as $download)
                            <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow duration-200 group">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $download->title }}</h3>
                                        @if($download->description)
                                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">{{ $download->description }}</p>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        @if($download->file_type === 'pdf')
                                            <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                            </svg>
                                        @elseif(in_array($download->file_type, ['doc', 'docx']))
                                            <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                            </svg>
                                        @elseif(in_array($download->file_type, ['xls', 'xlsx']))
                                            <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                            </svg>
                                        @else
                                            <svg class="w-8 h-8 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400 mb-4">
                                    <div class="flex items-center space-x-4">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                            </svg>
                                            {{ strtoupper($download->file_type) }}
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4"></path>
                                            </svg>
                                            {{ $download->formatted_file_size }}
                                        </span>
                                    </div>
                                </div>

                                @if($download->download_count > 0)
                                    <p class="text-xs text-gray-500 dark:text-gray-500 mb-3">
                                        {{ $download->download_count }} {{ Str::plural('download', $download->download_count) }}
                                    </p>
                                @endif

                                <a href="{{ route('downloads.download', $download->slug) }}" class="inline-flex items-center w-full justify-center px-4 sm:px-6 py-2.5 sm:py-3 hover:bg-gray-200 text-blue-700 border-2 font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            @if($downloads->isEmpty())
                <div class="text-center py-12">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <p class="text-gray-600 dark:text-gray-400 text-lg">No downloads available at this time.</p>
                </div>
            @endif
        </div>
    </section>
</div>
@endsection

