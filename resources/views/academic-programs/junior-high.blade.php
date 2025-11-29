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
                <p class="text-4xl md:text-5xl font-bold mb-4">Junior High School Programs</p>
                <p class="text-lg md:text-xl text-blue-100">Preparing learners for Senior High and beyond</p>
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
                        The Junior High School Department (Grades 7–10) provides learners with solid academic training,
                        values formation, and life skills that prepare them for the specialized tracks of Senior High School.
                    </p>
                    <p class="text-gray-800 leading-relaxed">
                        The program follows the K–12 curriculum and emphasizes critical thinking, communication, collaboration,
                        and creativity through classroom instruction, performance tasks, and co-curricular programs.
                    </p>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div class="bg-blue-50 rounded-xl p-6">
                            <h3 class="text-xl font-semibold mb-3 text-blue-900">Grade Levels</h3>
                            <ul class="space-y-2 text-gray-800 text-sm">
                                <li>• Grade 7</li>
                                <li>• Grade 8</li>
                                <li>• Grade 9</li>
                                <li>• Grade 10</li>
                            </ul>
                        </div>
                        <div class="bg-blue-50 rounded-xl p-6">
                            <h3 class="text-xl font-semibold mb-3 text-blue-900">Core Learning Areas</h3>
                            <ul class="space-y-2 text-gray-800 text-sm">
                                <li>• English, Filipino, and Literature</li>
                                <li>• Mathematics and Science</li>
                                <li>• Araling Panlipunan and MAPEH</li>
                                <li>• Technology and Livelihood Education (TLE)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-blue-50 rounded-2xl p-6 shadow">
                        <h3 class="text-xl font-semibold text-blue-900 mb-4">Program Features</h3>
                        <ul class="space-y-3 text-sm text-gray-800">
                            <li>• Competency-based assessments and performance tasks</li>
                            <li>• Guidance and counseling services for adolescents</li>
                            <li>• Student organizations and leadership opportunities</li>
                            <li>• Formation activities that strengthen faith and character</li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-2xl p-6 shadow border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Admission Overview</h3>
                        <p class="text-sm text-gray-700 mb-3">
                            New and transferee students undergo entrance assessment and interview. Form 138 and other school
                            records are required for proper grade-level placement.
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


