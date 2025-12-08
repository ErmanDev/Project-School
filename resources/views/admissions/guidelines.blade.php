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
                <p class="text-4xl md:text-5xl font-bold mb-4">Admission Guidelines</p>
                <p class="text-lg md:text-xl text-blue-100">Your step-by-step guide to joining San Isidro College</p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Introduction -->
            <div class="mb-12">
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Welcome to San Isidro College! We are committed to making the admission process as smooth and transparent as possible. 
                    This guide will walk you through the complete admission process, from initial inquiry to enrollment.
                </p>
            </div>

            <!-- Admission Process Steps -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Admission Process</h2>
                
                <div class="space-y-6">
                    <!-- Step 1 -->
                    <div class="bg-blue-50 rounded-xl p-6 shadow-sm border-l-4 border-blue-600">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full font-bold text-lg">
                                    1
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Inquiry and Information Gathering</h3>
                                <p class="text-gray-700 mb-3">
                                    Start by gathering information about our programs, admission requirements, and important dates. 
                                    You can visit our campus, browse our website, or contact the Admissions Office.
                                </p>
                                <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 ml-4">
                                    <li>Attend campus tours or virtual information sessions</li>
                                    <li>Review program offerings and curriculum</li>
                                    <li>Check admission requirements for your chosen program</li>
                                    <li>Note important deadlines and dates</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-blue-50 rounded-xl p-6 shadow-sm border-l-4 border-blue-600">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full font-bold text-lg">
                                    2
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Prepare Required Documents</h3>
                                <p class="text-gray-700 mb-3">
                                    Collect all necessary documents well in advance to avoid delays. Ensure all documents are authentic, 
                                    complete, and properly authenticated where required.
                                </p>
                                <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 ml-4">
                                    <li>Academic records (Form 138, Transcript of Records)</li>
                                    <li>Birth certificate (PSA-authenticated)</li>
                                    <li>Medical certificate</li>
                                    <li>Certificate of Good Moral Character</li>
                                    <li>ID pictures (2x2, white background)</li>
                                    <li>Other program-specific requirements</li>
                                </ul>
                                <div class="mt-3">
                                    <a href="{{ route('admissions.requirements') }}" class="inline-flex items-center text-blue-700 font-semibold text-sm hover:underline">
                                        View Complete List of Requirements
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-blue-50 rounded-xl p-6 shadow-sm border-l-4 border-blue-600">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full font-bold text-lg">
                                    3
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Submit Application</h3>
                                <p class="text-gray-700 mb-3">
                                    Complete and submit your application form along with all required documents. Applications can be 
                                    submitted online or in person at the Admissions Office.
                                </p>
                                <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 ml-4">
                                    <li>Fill out the application form completely and accurately</li>
                                    <li>Attach all required documents</li>
                                    <li>Pay the application fee (if applicable)</li>
                                    <li>Submit before the deadline</li>
                                    <li>Keep a copy of your submitted application</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="bg-blue-50 rounded-xl p-6 shadow-sm border-l-4 border-blue-600">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full font-bold text-lg">
                                    4
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Assessment and Evaluation</h3>
                                <p class="text-gray-700 mb-3">
                                    The Admissions Office will review your application and documents. You may be required to take 
                                    entrance examinations or participate in interviews, depending on your program.
                                </p>
                                <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 ml-4">
                                    <li>Entrance examination (if required)</li>
                                    <li>Interview with admissions panel</li>
                                    <li>Portfolio review (for specific programs)</li>
                                    <li>Academic record evaluation</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="bg-blue-50 rounded-xl p-6 shadow-sm border-l-4 border-blue-600">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full font-bold text-lg">
                                    5
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Admission Decision</h3>
                                <p class="text-gray-700 mb-3">
                                    You will be notified of the admission decision through email, phone, or official letter. 
                                    Accepted students will receive an admission letter with next steps.
                                </p>
                                <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 ml-4">
                                    <li>Check your email and contact information regularly</li>
                                    <li>Review admission letter and conditions (if any)</li>
                                    <li>Note enrollment deadlines</li>
                                    <li>Prepare for enrollment requirements</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Step 6 -->
                    <div class="bg-blue-50 rounded-xl p-6 shadow-sm border-l-4 border-blue-600">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="flex items-center justify-center w-12 h-12 bg-blue-600 text-white rounded-full font-bold text-lg">
                                    6
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Enrollment</h3>
                                <p class="text-gray-700 mb-3">
                                    Complete your enrollment by submitting additional documents, paying fees, and registering for classes. 
                                    Attend orientation sessions to familiarize yourself with the campus and policies.
                                </p>
                                <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 ml-4">
                                    <li>Submit enrollment documents</li>
                                    <li>Pay tuition and other fees</li>
                                    <li>Register for classes</li>
                                    <li>Attend new student orientation</li>
                                    <li>Get your student ID and other materials</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Important Policies -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Important Policies</h2>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-green-50 rounded-xl p-6 shadow-sm border border-green-200">
                        <h3 class="text-xl font-semibold text-green-900 mb-3">Application Deadlines</h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li>• Applications are accepted year-round, but early application is encouraged</li>
                            <li>• Program-specific deadlines may apply</li>
                            <li>• Late applications may be considered on a case-by-case basis</li>
                            <li>• Check with the Admissions Office for current deadlines</li>
                        </ul>
                    </div>

                    <div class="bg-yellow-50 rounded-xl p-6 shadow-sm border border-yellow-200">
                        <h3 class="text-xl font-semibold text-yellow-900 mb-3">Document Authenticity</h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li>• All documents must be original or certified true copies</li>
                            <li>• Falsified documents will result in immediate rejection</li>
                            <li>• Documents submitted become property of the college</li>
                            <li>• Keep copies of all submitted documents</li>
                        </ul>
                    </div>

                    <div class="bg-purple-50 rounded-xl p-6 shadow-sm border border-purple-200">
                        <h3 class="text-xl font-semibold text-purple-900 mb-3">Application Fees</h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li>• Application fees are non-refundable</li>
                            <li>• Fee amounts vary by program level</li>
                            <li>• Payment can be made online or at the Cashier's Office</li>
                            <li>• Fee waivers may be available for qualified applicants</li>
                        </ul>
                    </div>

                    <div class="bg-indigo-50 rounded-xl p-6 shadow-sm border border-indigo-200">
                        <h3 class="text-xl font-semibold text-indigo-900 mb-3">Transfer Students</h3>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li>• Transfer credits are evaluated on a case-by-case basis</li>
                            <li>• Official transcript and honorable dismissal required</li>
                            <li>• Minimum residency requirements apply</li>
                            <li>• Grade requirements must be met for credit transfer</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tips for Success -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tips for a Successful Application</h2>
                
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8 shadow-sm">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Start Early</h4>
                                    <p class="text-sm text-gray-700">Begin preparing your documents and application well before the deadline.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Be Accurate</h4>
                                    <p class="text-sm text-gray-700">Double-check all information and ensure documents are complete and authentic.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Stay Organized</h4>
                                    <p class="text-sm text-gray-700">Keep copies of all documents and maintain a checklist of requirements.</p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Ask Questions</h4>
                                    <p class="text-sm text-gray-700">Don't hesitate to contact the Admissions Office if you need clarification.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Follow Instructions</h4>
                                    <p class="text-sm text-gray-700">Read all instructions carefully and follow them precisely to avoid delays.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-blue-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <h4 class="font-semibold text-gray-900 mb-1">Stay Updated</h4>
                                    <p class="text-sm text-gray-700">Regularly check your email and the college website for updates and announcements.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-blue-100 rounded-xl p-8 border border-blue-200">
                <h3 class="text-2xl font-semibold text-blue-900 mb-4">Need Assistance?</h3>
                <p class="text-gray-800 mb-6">
                    Our Admissions Office is here to help you throughout the application process. Feel free to reach out with any questions or concerns.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        Contact Admissions Office
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <a href="{{ route('admissions.requirements') }}" class="inline-flex items-center px-6 py-3 bg-white hover:bg-gray-50 text-blue-700 font-semibold rounded-lg border-2 border-blue-600 transition-colors duration-200">
                        View Requirements
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection








