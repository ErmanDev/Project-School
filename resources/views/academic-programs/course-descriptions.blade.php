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
                <p class="text-4xl md:text-5xl font-bold mb-4">Course Descriptions and Curriculum Outlines</p>
                <p class="text-lg md:text-xl text-blue-100">Comprehensive academic program details</p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <p class="text-lg text-gray-700 leading-relaxed">
                    This section provides detailed course descriptions and curriculum outlines for our academic programs across all levels. 
                    Each program is designed to provide students with the knowledge, skills, and values necessary for their academic and professional success.
                </p>
            </div>

            <!-- College Programs -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">College Programs</h2>
                
                <!-- Computer Science -->
                <div class="bg-blue-50 rounded-xl p-6 mb-6 shadow-sm">
                    <h3 class="text-2xl font-semibold text-blue-900 mb-4">Bachelor of Science in Computer Science</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Course Description</h4>
                            <p class="text-gray-800 leading-relaxed">
                                The program covers core topics including programming languages, database systems, web development, 
                                mobile applications, artificial intelligence, and cybersecurity. Students will engage in hands-on 
                                projects and internships to gain practical experience.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Curriculum Outline</h4>
                            <div class="bg-white rounded-lg p-4 space-y-2 text-sm text-gray-800">
                                <p><strong>Year 1:</strong> Introduction to Programming, Data Structures, Discrete Mathematics</p>
                                <p><strong>Year 2:</strong> Algorithms, Database Systems, Software Engineering</p>
                                <p><strong>Year 3:</strong> Web Development, Mobile Applications, Operating Systems</p>
                                <p><strong>Year 4:</strong> Capstone Project, Internship, Advanced Electives</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Administration -->
                <div class="bg-blue-50 rounded-xl p-6 mb-6 shadow-sm">
                    <h3 class="text-2xl font-semibold text-blue-900 mb-4">Bachelor of Science in Business Administration</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Course Description</h4>
                            <p class="text-gray-800 leading-relaxed">
                                Students will study core business disciplines including accounting, finance, marketing, management, 
                                and operations. The program includes case studies, group projects, and real-world business simulations.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Curriculum Outline</h4>
                            <div class="bg-white rounded-lg p-4 space-y-2 text-sm text-gray-800">
                                <p><strong>Year 1:</strong> Principles of Business, Economics, Accounting Fundamentals</p>
                                <p><strong>Year 2:</strong> Marketing, Finance, Management Principles</p>
                                <p><strong>Year 3:</strong> Strategic Management, Business Law, Operations</p>
                                <p><strong>Year 4:</strong> Capstone Project, Internship, Specialization Courses</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="bg-blue-50 rounded-xl p-6 mb-6 shadow-sm">
                    <h3 class="text-2xl font-semibold text-blue-900 mb-4">Bachelor of Arts in Education</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Course Description</h4>
                            <p class="text-gray-800 leading-relaxed">
                                Students will study educational psychology, curriculum development, instructional methods, and 
                                classroom management. The program includes extensive field experience in local schools.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Curriculum Outline</h4>
                            <div class="bg-white rounded-lg p-4 space-y-2 text-sm text-gray-800">
                                <p><strong>Year 1:</strong> Introduction to Education, Child Development, Educational Psychology</p>
                                <p><strong>Year 2:</strong> Curriculum Design, Instructional Methods, Assessment</p>
                                <p><strong>Year 3:</strong> Special Education, Classroom Management, Technology in Education</p>
                                <p><strong>Year 4:</strong> Student Teaching, Capstone Project, Professional Development</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Information Technology (Graduate) -->
                <div class="bg-blue-50 rounded-xl p-6 mb-6 shadow-sm">
                    <h3 class="text-2xl font-semibold text-blue-900 mb-4">Master of Science in Information Technology</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Course Description</h4>
                            <p class="text-gray-800 leading-relaxed">
                                The program covers advanced topics in IT management, cloud computing, cybersecurity, data analytics, 
                                and emerging technologies. Students will work on real-world projects and research initiatives.
                            </p>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-2">Curriculum Outline</h4>
                            <div class="bg-white rounded-lg p-4 space-y-2 text-sm text-gray-800">
                                <p><strong>Year 1:</strong> IT Management, Cloud Computing, Cybersecurity</p>
                                <p><strong>Year 2:</strong> Data Analytics, Emerging Technologies, Thesis Project</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Basic Education Programs Overview -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Basic Education Programs</h2>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Preschool -->
                    <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-green-900 mb-3">Preschool</h3>
                        <p class="text-gray-800 text-sm mb-3">
                            Play-based curriculum focusing on early literacy, numeracy, social skills, and values formation.
                        </p>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li>• Language and Communication</li>
                            <li>• Early Math and Science</li>
                            <li>• Creative Arts and Play</li>
                            <li>• Social Skills Development</li>
                        </ul>
                    </div>

                    <!-- Elementary -->
                    <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-green-900 mb-3">Elementary (Grades 1-6)</h3>
                        <p class="text-gray-800 text-sm mb-3">
                            Core subjects: English, Filipino, Mathematics, Science, Araling Panlipunan, MAPEH, and Values Education.
                        </p>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li>• Communication Skills</li>
                            <li>• Problem-Solving</li>
                            <li>• Scientific Inquiry</li>
                            <li>• Civic Awareness</li>
                        </ul>
                    </div>

                    <!-- Junior High -->
                    <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-green-900 mb-3">Junior High (Grades 7-10)</h3>
                        <p class="text-gray-800 text-sm mb-3">
                            K-12 curriculum with emphasis on critical thinking, communication, collaboration, and creativity.
                        </p>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li>• Core Learning Areas</li>
                            <li>• Technology and Livelihood Education</li>
                            <li>• Values Formation</li>
                            <li>• Performance Tasks</li>
                        </ul>
                    </div>

                    <!-- Senior High -->
                    <div class="bg-green-50 rounded-xl p-6 shadow-sm">
                        <h3 class="text-xl font-semibold text-green-900 mb-3">Senior High (Grades 11-12)</h3>
                        <p class="text-gray-800 text-sm mb-3">
                            Specialized tracks: Academic (STEM, ABM, HUMSS, GAS) and Technical-Vocational-Livelihood strands.
                        </p>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li>• Track-Specific Subjects</li>
                            <li>• Work Immersion</li>
                            <li>• Research and Capstone</li>
                            <li>• Career Guidance</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="bg-blue-100 rounded-xl p-6 border border-blue-200">
                <h3 class="text-xl font-semibold text-blue-900 mb-3">For More Information</h3>
                <p class="text-gray-800 mb-4">
                    For detailed course syllabi, specific curriculum requirements, or program-specific information, 
                    please contact the respective department offices or visit the Registrar's Office.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center text-blue-700 font-semibold text-sm hover:underline">
                        Contact Us
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <a href="{{ route('admissions.requirements') }}" class="inline-flex items-center text-blue-700 font-semibold text-sm hover:underline">
                        View Admission Requirements
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

