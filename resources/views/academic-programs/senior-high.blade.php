@extends('layouts.guest')

@section('slot')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100">
    <!-- Hero -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-blue-700 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white relative">
                <a href="{{ route('home') }}" class="absolute left-0 top-1/2 -translate-y-1/2 text-white hover:text-white" title="Back to Home">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <p class="text-4xl md:text-5xl font-bold mb-4">Senior High School Programs</p>
                <p class="text-lg md:text-xl text-blue-100">Specialized tracks for college and career readiness</p>
            </div>
        </div>
    </section>

    <!-- Overview -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-10">
                <div class="lg:col-span-2 space-y-6">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Program Overview</h2>
                    <p class="text-gray-800 leading-relaxed">
                        The Senior High School Department (Grades 11–12) offers academic and specialized tracks that prepare
                        learners for college, technical-vocational careers, or entrepreneurship.
                    </p>
                    <p class="text-gray-800 leading-relaxed">
                        Learners are guided in choosing tracks based on their interests, strengths, and future plans, supported
                        by career guidance and mentoring.
                    </p>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div class="bg-blue-50 rounded-xl p-6">
                            <h3 class="text-xl font-semibold mb-3 text-blue-900">Offered Tracks</h3>
                            <ul class="space-y-2 text-gray-800 text-sm">
                                <li>• Academic Track (e.g., STEM, ABM, HUMSS, GAS)</li>
                                <li>• Technical-Vocational-Livelihood (TVL) strands (if applicable)</li>
                            </ul>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-6">
                            <h3 class="text-xl font-semibold mb-3 text-blue-900">Program Focus</h3>
                            <ul class="space-y-2 text-gray-800 text-sm">
                                <li>• College-level readiness in core subjects</li>
                                <li>• Research, immersion, and work experience</li>
                                <li>• Values and leadership formation</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-blue-50 rounded-2xl p-6 shadow">
                        <h3 class="text-xl font-semibold text-blue-900 mb-4">Highlights</h3>
                        <ul class="space-y-3 text-sm text-gray-800">
                            <li>• Career guidance and counseling</li>
                            <li>• Work Immersion and Community Involvement</li>
                            <li>• Research and Capstone Projects</li>
                            <li>• Strong linkage with Higher Education and Industry</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Admission Overview</h3>
                        <p class="text-sm text-gray-700 mb-3">
                            Senior High applicants submit school records, undergo assessment, and attend orientation. Track and
                            strand selection is assisted by the Guidance Office.
                        </p>
                        <a href="{{ route('admissions.requirements') }}" class="inline-flex items-center text-blue-700 font-semibold text-sm hover:underline">
                            View Admission Requirements
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection


