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
                <p class="text-4xl md:text-5xl font-bold mb-4">Admission and Graduation Requirements</p>
                <p class="text-lg md:text-xl text-blue-100">Essential information for prospective and current students</p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <p class="text-lg text-gray-700 leading-relaxed">
                    This section outlines the admission requirements for new students and graduation requirements for all academic programs. 
                    Requirements may vary by program level and specific degree. Please consult with the Registrar's Office for the most current information.
                </p>
            </div>

            <!-- Admission Requirements -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Admission Requirements</h2>
                
                <!-- College Programs -->
                <div class="mb-8">
                    <h3 class="text-2xl font-semibold text-blue-900 mb-4">College Programs</h3>
                    
                    <div class="bg-blue-50 rounded-xl p-6 mb-4 shadow-sm">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Bachelor's Degree Programs</h4>
                        <div class="space-y-2 text-gray-800">
                            <p class="font-medium">General Requirements:</p>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm">
                                <li>High school diploma or equivalent (Form 138 / SHS Report Card)</li>
                                <li>Minimum GPA of 2.5 (or equivalent grade)</li>
                                <li>SAT/ACT scores (if applicable)</li>
                                <li>Letters of recommendation (2-3)</li>
                                <li>Personal statement or essay</li>
                                <li>Birth certificate (NSO/PSA authenticated)</li>
                                <li>Medical certificate</li>
                                <li>Recent 2x2 ID photos</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-blue-50 rounded-xl p-6 mb-4 shadow-sm">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Graduate Programs (Master's Degree)</h4>
                        <div class="space-y-2 text-gray-800">
                            <p class="font-medium">General Requirements:</p>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm">
                                <li>Bachelor's degree in related field</li>
                                <li>Minimum GPA of 3.0 (or equivalent)</li>
                                <li>GRE scores (optional, program-dependent)</li>
                                <li>Letters of recommendation (2-3)</li>
                                <li>Statement of purpose</li>
                                <li>Official transcript of records</li>
                                <li>Research proposal (for thesis programs)</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Basic Education -->
                <div class="mb-8">
                    <h3 class="text-2xl font-semibold text-green-900 mb-4">Basic Education Programs</h3>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Preschool</h4>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm text-gray-800">
                                <li>Age requirements (as per DepEd guidelines)</li>
                                <li>Birth certificate</li>
                                <li>Medical certificate</li>
                                <li>Parent/guardian interview</li>
                                <li>Basic readiness assessment</li>
                            </ul>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Elementary (Grades 1-6)</h4>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm text-gray-800">
                                <li>Age and grade-level requirements</li>
                                <li>Form 138 (for transferees)</li>
                                <li>Birth certificate</li>
                                <li>Medical certificate</li>
                                <li>Basic assessment and interview</li>
                            </ul>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Junior High (Grades 7-10)</h4>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm text-gray-800">
                                <li>Form 138 (Report Card)</li>
                                <li>Birth certificate</li>
                                <li>Medical certificate</li>
                                <li>Entrance assessment</li>
                                <li>Student and parent interview</li>
                            </ul>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Senior High (Grades 11-12)</h4>
                                <ul class="list-disc list-inside space-y-1 ml-4 text-sm text-gray-800">
                                <li>Form 138 (Grade 10 Report Card)</li>
                                <li>Birth certificate</li>
                                <li>Medical certificate</li>
                                <li>Entrance assessment</li>
                                <li>Track and strand selection consultation</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Graduation Requirements -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Graduation Requirements</h2>
                
                <!-- College Programs -->
                <div class="mb-8">
                    <h3 class="text-2xl font-semibold text-blue-900 mb-4">College Programs</h3>
                    
                    <div class="bg-blue-50 rounded-xl p-6 mb-4 shadow-sm">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Bachelor's Degree Programs</h4>
                        <div class="space-y-2 text-gray-800">
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm">
                                <li>Completion of 120 credit hours (program-specific)</li>
                                <li>Minimum cumulative GPA of 2.0</li>
                                <li>Completion of capstone project or thesis (if required)</li>
                                <li>Internship or work experience (if required by program)</li>
                                <li>All required courses passed</li>
                                <li>No outstanding financial obligations</li>
                                <li>Completion of community extension hours (if required)</li>
                                <li>Clearance from all departments</li>
                            </ul>
                        </div>
                    </div>

                    <div class="bg-blue-50 rounded-xl p-6 mb-4 shadow-sm">
                        <h4 class="text-lg font-semibold text-gray-900 mb-3">Graduate Programs (Master's Degree)</h4>
                        <div class="space-y-2 text-gray-800">
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm">
                                <li>Completion of 36 credit hours (program-specific)</li>
                                <li>Minimum cumulative GPA of 3.0</li>
                                <li>Completion of thesis or capstone project</li>
                                <li>Successful defense of thesis (if applicable)</li>
                                <li>All required courses passed</li>
                                <li>No outstanding financial obligations</li>
                                <li>Clearance from all departments</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Basic Education -->
                <div class="mb-8">
                    <h3 class="text-2xl font-semibold text-green-900 mb-4">Basic Education Programs</h3>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Preschool</h4>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm text-gray-800">
                                <li>Completion of all required activities</li>
                                <li>Attendance requirements met</li>
                                <li>Readiness assessment passed</li>
                                <li>Parent-teacher conference participation</li>
                            </ul>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Elementary (Grades 1-6)</h4>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm text-gray-800">
                                <li>Completion of all grade-level subjects</li>
                                <li>Minimum passing grade in all subjects</li>
                                <li>Attendance requirements met</li>
                                <li>Completion of co-curricular activities</li>
                            </ul>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Junior High (Grades 7-10)</h4>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm text-gray-800">
                                <li>Completion of all core learning areas</li>
                                <li>Minimum passing grade in all subjects</li>
                                <li>Completion of performance tasks</li>
                                <li>Attendance and participation requirements</li>
                            </ul>
                        </div>

                        <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Senior High (Grades 11-12)</h4>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-sm text-gray-800">
                                <li>Completion of all track-specific subjects</li>
                                <li>Minimum passing grade in all subjects</li>
                                <li>Completion of Work Immersion</li>
                                <li>Completion of Research/Capstone Project</li>
                                <li>Passing scores on certification exams (if applicable)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="bg-blue-100 rounded-xl p-6 border border-blue-200">
                <h3 class="text-xl font-semibold text-blue-900 mb-3">Important Notes</h3>
                <ul class="space-y-2 text-gray-800 text-sm">
                    <li>• Requirements may vary by specific program. Please consult the Registrar's Office or the respective department for program-specific requirements.</li>
                    <li>• All documents must be authenticated and submitted within the specified deadlines.</li>
                    <li>• Admission and graduation requirements are subject to change based on CHED, DepEd, and institutional policies.</li>
                    <li>• For transferees, additional requirements such as honorable dismissal and transcript of records may be required.</li>
                </ul>
                <div class="mt-4 flex flex-wrap gap-4">
                    <a href="{{ route('admissions.requirements') }}" class="inline-flex items-center text-blue-700 font-semibold text-sm hover:underline">
                        View Detailed Admission Requirements
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center text-blue-700 font-semibold text-sm hover:underline">
                        Contact Registrar's Office
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

