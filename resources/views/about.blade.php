@extends('layouts.guest')

@section('slot')
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Hero Section -->
    <section class="py-16 bg-gradient-to-r from-indigo-600 to-blue-600 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white relative">
                <a href="{{ route('home') }}" class="absolute left-0 top-1/2 -translate-y-1/2 text-white hover:text-blue-100 transition-colors duration-200" title="Back to Home">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <h1 class="text-4xl md:text-5xl font-bold mb-4">About San Isidro College</h1>
                <p class="text-xl text-blue-100">Excellence in Education Since 1949</p>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Our History</h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto mb-8"></div>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="prose prose-lg dark:prose-invert">
                    <div class="bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-8 shadow-lg">
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                            San Isidro College was founded in 1949 with a vision to provide quality education to the local community. 
                            Starting with just 50 students, the college has grown into a premier educational institution serving over 2,500 students annually.
                        </p>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed mb-6">
                            Over the decades, we have remained committed to academic excellence, character formation, and community service. 
                            Our graduates have gone on to become leaders in various fields, contributing to the development of our nation.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                            <div class="text-center p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                                <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">1949</div>
                                <div class="text-gray-600 dark:text-gray-300">Founded</div>
                            </div>
                            <div class="text-center p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                                <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">70+</div>
                                <div class="text-gray-600 dark:text-gray-300">Years of Excellence</div>
                            </div>
                            <div class="text-center p-4 bg-white dark:bg-gray-700 rounded-lg shadow">
                                <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-2">15,000+</div>
                                <div class="text-gray-600 dark:text-gray-300">Graduates</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Vision & Mission</h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto mb-8"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl p-8 shadow-xl text-white">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Our Vision</h3>
                    </div>
                    <p class="text-blue-100 leading-relaxed">
                        San Isidro College envisions becoming a leading educational institution that produces globally competitive, 
                        morally upright, and socially responsible individuals who will contribute to nation-building and sustainable development.
                    </p>
                </div>

                <div class="bg-gradient-to-br from-indigo-600 to-purple-600 rounded-2xl p-8 shadow-xl text-white">
                    <div class="text-center mb-6">
                        <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                    </div>
                    <p class="text-purple-100 leading-relaxed">
                        San Isidro College is committed to providing quality, accessible, and relevant education through excellent instruction, 
                        innovative research, community extension, and sustainable programs that foster academic excellence, 
                        character formation, and social responsibility among its stakeholders.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Our Core Values</h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto mb-8"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Excellence -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Excellence</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Pursuing the highest standards in all endeavors</p>
                    </div>
                </div>

                <!-- Integrity -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-gray-700 dark:to-gray-600 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Integrity</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Honest, ethical, and principled in all actions</p>
                    </div>
                </div>

                <!-- Service -->
                <div class="bg-gradient-to-br from-purple-50 to-violet-50 dark:from-gray-700 dark:to-gray-600 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Service</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Committed to serving the community</p>
                    </div>
                </div>

                <!-- Innovation -->
                <div class="bg-gradient-to-br from-orange-50 to-red-50 dark:from-gray-700 dark:to-gray-600 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Innovation</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Embracing creativity and technological advancement</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Organizational Structure & Leadership Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Leadership & Organization</h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto mb-8"></div>
            </div>
            
            <!-- Leadership Profiles -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <!-- President -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gradient-to-br from-indigo-600 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-4xl font-bold">JP</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Dr. Brian Sia</h3>
                        <p class="text-indigo-600 dark:text-indigo-400 mb-4">School President</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Leading the institution with 20+ years of experience in education and administration.</p>
                    </div>
                </div>

                <!-- Vice President -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gradient-to-br from-green-600 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-4xl font-bold">SM</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Prof. Sarah Martinez</h3>
                        <p class="text-green-600 dark:text-green-400 mb-4">Vice President for Academic Affairs</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Championing academic excellence and curriculum development.</p>
                    </div>
                </div>

                <!-- Dean -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="text-center">
                        <div class="w-32 h-32 bg-gradient-to-br from-purple-600 to-violet-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white text-4xl font-bold">RC</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Dr. Robert Chen</h3>
                        <p class="text-purple-600 dark:text-purple-400 mb-4">Dean of Student Affairs</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">Dedicated to student welfare and holistic development.</p>
                    </div>
                </div>
            </div>

            <!-- Organizational Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-4 sm:p-6 md:p-8 shadow-lg">
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 dark:text-white mb-4 sm:mb-6 text-center">Organizational Structure</h3>
                <div class="flex flex-col items-center space-y-3 sm:space-y-4">
                    <!-- Level 1 -->
                    <div class="w-full max-w-xs sm:max-w-sm md:w-64 p-3 sm:p-4 bg-gradient-to-r from-indigo-600 to-blue-600 rounded-lg text-white text-center text-sm sm:text-base font-semibold">
                        School President
                    </div>
                    
                    <!-- Level 2 -->
                    <div class="flex flex-col sm:flex-row items-center sm:items-stretch gap-3 sm:gap-4 w-full max-w-2xl">
                        <div class="w-full sm:w-48 p-3 sm:p-4 bg-gradient-to-r from-green-600 to-emerald-600 rounded-lg text-white text-center text-sm sm:text-base font-semibold">
                            VP Academic Affairs
                        </div>
                        <div class="w-full sm:w-48 p-3 sm:p-4 bg-gradient-to-r from-purple-600 to-violet-600 rounded-lg text-white text-center text-sm sm:text-base font-semibold">
                            VP Administrative
                        </div>
                        <div class="w-full sm:w-48 p-3 sm:p-4 bg-gradient-to-r from-orange-600 to-red-600 rounded-lg text-white text-center text-sm sm:text-base font-semibold">
                            VP Finance
                        </div>
                    </div>
                    
                    <!-- Level 3 -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 sm:gap-3 mt-2 sm:mt-4 w-full max-w-4xl">
                        <div class="w-full p-2 sm:p-3 bg-blue-100 dark:bg-blue-900 rounded-lg text-gray-900 dark:text-white text-center text-xs sm:text-sm font-medium">
                            Deans
                        </div>
                        <div class="w-full p-2 sm:p-3 bg-green-100 dark:bg-green-900 rounded-lg text-gray-900 dark:text-white text-center text-xs sm:text-sm font-medium">
                            Directors
                        </div>
                        <div class="w-full p-2 sm:p-3 bg-purple-100 dark:bg-purple-900 rounded-lg text-gray-900 dark:text-white text-center text-xs sm:text-sm font-medium">
                            Coordinators
                        </div>
                        <div class="w-full p-2 sm:p-3 bg-orange-100 dark:bg-orange-900 rounded-lg text-gray-900 dark:text-white text-center text-xs sm:text-sm font-medium">
                            Faculty
                        </div>
                        <div class="w-full p-2 sm:p-3 bg-red-100 dark:bg-red-900 rounded-lg text-gray-900 dark:text-white text-center text-xs sm:text-sm font-medium">
                            Staff
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Campus Map & Virtual Tour Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Campus Map & Virtual Tour</h2>
                <div class="w-24 h-1 bg-indigo-600 mx-auto mb-8"></div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Campus Map -->
                <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Campus Location</h3>
                    <div class="aspect-w-16 aspect-h-9 bg-gradient-to-br from-indigo-200 to-blue-200 dark:from-gray-600 dark:to-gray-500 rounded-lg overflow-hidden">
                        <div class="flex items-center justify-center h-64 bg-gradient-to-br from-indigo-100 to-blue-100 dark:from-gray-700 dark:to-gray-600">
                            <!-- Placeholder for Google Maps or map image -->
                            <div class="text-center p-8">
                                <svg class="w-24 h-24 text-indigo-600 dark:text-indigo-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="text-gray-700 dark:text-gray-300 font-medium">Main Campus Location</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">123 Education Street, San Isidro City</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6">
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-2">Campus Buildings:</h4>
                            <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Administration Building
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Academic Buildings (A, B, C, D)
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Library & Learning Center
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Gymnasium & Sports Facilities
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Student Center & Cafeteria
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Virtual Tour -->
                <div class="bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-8 shadow-lg">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Virtual Campus Tour</h3>
                    <div class="aspect-w-16 aspect-h-9 bg-gradient-to-br from-indigo-100 to-blue-100 dark:from-gray-600 dark:to-gray-500 rounded-lg overflow-hidden mb-6">
                        <div class="flex items-center justify-center h-64">
                            <!-- Placeholder for 360° view or embedded video -->
                            <div class="text-center p-8">
                                <svg class="w-24 h-24 text-indigo-600 dark:text-indigo-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-700 dark:text-gray-300 font-medium">Interactive 360° Campus Tour</p>
                                <p class="text-gray-600 dark:text-gray-400 text-sm mt-2">Experience our campus from anywhere</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Start Virtual Tour
                        </button>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <button class="bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-medium py-3 px-4 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Gallery
                            </button>
                            <button class="bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 font-medium py-3 px-4 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                Contact
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

