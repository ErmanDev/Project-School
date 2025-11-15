<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentServicesController extends Controller
{
    /**
     * Get static student services data
     */
    private function getStaticData()
    {
        return collect([
            // Guidance and Counseling Services
            (object) [
                'id' => 1,
                'title' => 'Academic Advising',
                'description' => 'Get personalized guidance on course selection, degree planning, and academic success strategies.',
                'content' => "Our Academic Advising Office is dedicated to helping students navigate their educational journey successfully. Our experienced advisors work one-on-one with students to develop personalized academic plans that align with their career goals and interests.\n\nServices We Provide:\n• Course selection and registration assistance\n• Degree planning and program requirements\n• Academic progress monitoring\n• Major and minor exploration\n• Transfer credit evaluation\n• Academic policy interpretation\n• Study skills and time management strategies\n\nOur advisors are available for both scheduled appointments and walk-in consultations. We encourage students to meet with their advisor at least once per semester to ensure they stay on track for graduation.\n\nWhether you're a new student exploring your options or a continuing student planning for your next semester, our academic advisors are here to support your success.",
                'category' => 'guidance',
                'slug' => 'academic-advising',
                'location' => 'Student Services Building, Room 201',
                'hours' => 'Monday - Friday: 8:00 AM - 5:00 PM\nSaturday: 9:00 AM - 1:00 PM',
                'contact_info' => 'Email: advising@example.com\nPhone: (555) 123-4567',
                'website_url' => null,
                'is_active' => true,
            ],
            (object) [
                'id' => 2,
                'title' => 'Career Counseling',
                'description' => 'Explore career options and plan your professional future with expert guidance.',
                'content' => "The Career Counseling Center provides comprehensive career development services to help students explore career options, develop professional skills, and successfully transition from college to career.\n\nOur Services Include:\n• Career assessment and exploration\n• Resume and cover letter writing assistance\n• Interview preparation and mock interviews\n• Job search strategies and techniques\n• Internship and co-op program coordination\n• Networking opportunities and career fairs\n• Professional development workshops\n• Graduate school application support\n• Salary negotiation guidance\n\nWe offer individual career counseling sessions where students can discuss their career goals, interests, and concerns. Our career counselors help students identify their strengths, explore various career paths, and develop action plans for achieving their professional objectives.\n\nAdditionally, we maintain partnerships with employers and host regular career fairs, networking events, and employer information sessions to connect students with potential opportunities.",
                'category' => 'guidance',
                'slug' => 'career-counseling',
                'location' => 'Career Center, Room 305',
                'hours' => 'Monday - Friday: 9:00 AM - 4:00 PM',
                'contact_info' => 'Email: career@example.com\nPhone: (555) 123-4568',
                'website_url' => null,
                'is_active' => true,
            ],
            (object) [
                'id' => 3,
                'title' => 'Personal Counseling',
                'description' => 'Confidential counseling services for personal, emotional, and mental health support.',
                'content' => "Our Personal Counseling Services provide confidential, professional support to help students navigate personal challenges, manage stress, and maintain emotional well-being.\n\nServices Offered:\n• Individual counseling sessions\n• Group therapy and support groups\n• Crisis intervention and support\n• Stress and anxiety management\n• Relationship counseling\n• Grief and loss support\n• Time management and study skills\n• Substance abuse counseling\n\nOur licensed counselors are trained to help with a wide range of concerns including academic stress, relationship issues, family problems, depression, anxiety, and other mental health concerns. All sessions are confidential and designed to support your personal growth and well-being.\n\nWe understand that college can be challenging, and we're here to help you succeed both academically and personally. Appointments are available, and walk-in hours are offered for urgent concerns.",
                'category' => 'guidance',
                'slug' => 'personal-counseling',
                'location' => 'Counseling Center, Room 205',
                'hours' => 'Monday - Friday: 9:00 AM - 5:00 PM\nWalk-in hours: Monday - Thursday: 2:00 PM - 4:00 PM',
                'contact_info' => 'Email: counseling@example.com\nPhone: (555) 123-4571\nCrisis Hotline: (555) 123-HELP',
                'website_url' => null,
                'is_active' => true,
            ],
            
            // Library Resources & Digital Services
            (object) [
                'id' => 4,
                'title' => 'Library Services',
                'description' => 'Access books, digital resources, research assistance, and study spaces.',
                'content' => "Our campus library provides comprehensive resources and services to support your academic success. Whether you need books, research databases, study spaces, or expert research assistance, our library staff is here to help.\n\nLibrary Resources:\n• Extensive print and digital book collection\n• Academic databases and journals\n• E-books and online resources\n• Research guides and tutorials\n• Interlibrary loan services\n• Reference and research assistance\n• Citation help and writing support\n\nStudy Spaces:\n• Quiet study areas\n• Group study rooms (reservable)\n• Computer labs with specialized software\n• Printing and scanning services\n• 24/7 study hall access\n\nServices:\n• Research consultations with librarians\n• Workshops on research skills\n• Technology assistance\n• Document delivery services\n• Access to special collections\n\nOur library is open extended hours during the semester and provides both in-person and online services to meet your research and study needs.",
                'category' => 'library',
                'slug' => 'library-services',
                'location' => 'Main Library Building',
                'hours' => 'Monday - Thursday: 7:00 AM - 11:00 PM\nFriday: 7:00 AM - 8:00 PM\nSaturday: 9:00 AM - 6:00 PM\nSunday: 12:00 PM - 10:00 PM',
                'contact_info' => 'Email: library@example.com\nPhone: (555) 123-4600\nText: (555) 123-LIB',
                'website_url' => 'https://library.example.com',
                'is_active' => true,
            ],
            (object) [
                'id' => 5,
                'title' => 'Digital Learning Resources',
                'description' => 'Online learning tools, software access, and digital academic resources.',
                'content' => "Our Digital Learning Resources provide students with access to cutting-edge technology, software, and online learning platforms to enhance your educational experience.\n\nAvailable Resources:\n• Learning management system access\n• Online course materials and e-textbooks\n• Educational software and applications\n• Video conferencing tools\n• Cloud storage and collaboration platforms\n• Digital media creation tools\n• Online tutoring and study groups\n\nSoftware Access:\n• Microsoft Office Suite\n• Adobe Creative Cloud\n• Statistical analysis software\n• Programming development tools\n• Design and multimedia software\n• Specialized academic software\n\nSupport Services:\n• Technology help desk\n• Software installation assistance\n• Digital literacy workshops\n• Online learning orientation\n• Technical troubleshooting\n\nAll students have access to these digital resources through their student accounts. Our IT support team is available to help you get started and troubleshoot any issues.",
                'category' => 'library',
                'slug' => 'digital-learning-resources',
                'location' => 'Technology Center, Room 101',
                'hours' => 'Monday - Friday: 8:00 AM - 8:00 PM\nSaturday: 10:00 AM - 4:00 PM',
                'contact_info' => 'Email: digital@example.com\nPhone: (555) 123-4601',
                'website_url' => 'https://digital.example.com',
                'is_active' => true,
            ],
            
            // Student Organizations & Activities
            (object) [
                'id' => 6,
                'title' => 'Student Government',
                'description' => 'Get involved in student leadership and represent your peers.',
                'content' => "Student Government provides opportunities for students to develop leadership skills, represent student interests, and make a positive impact on campus life.\n\nWhat We Do:\n• Represent student interests to administration\n• Allocate student activity fees\n• Organize campus events and activities\n• Advocate for student concerns\n• Plan community service projects\n• Coordinate student clubs and organizations\n\nHow to Get Involved:\n• Run for elected positions\n• Join committees and task forces\n• Attend open meetings\n• Volunteer for events and projects\n• Participate in student forums\n\nBenefits of Participation:\n• Leadership development\n• Networking opportunities\n• Resume building experience\n• Making a difference on campus\n• Building community connections\n\nStudent Government meetings are open to all students. We encourage everyone to get involved and help shape the student experience at our institution.",
                'category' => 'organizations',
                'slug' => 'student-government',
                'location' => 'Student Center, Room 301',
                'hours' => 'Monday - Friday: 10:00 AM - 4:00 PM\nMeetings: Every Tuesday at 6:00 PM',
                'contact_info' => 'Email: studentgov@example.com\nPhone: (555) 123-4700',
                'website_url' => null,
                'is_active' => true,
            ],
            (object) [
                'id' => 7,
                'title' => 'Clubs and Organizations',
                'description' => 'Join student clubs, organizations, and interest groups.',
                'content' => "We have over 50 active student clubs and organizations covering a wide range of interests, from academic and professional groups to cultural, recreational, and service organizations.\n\nTypes of Organizations:\n• Academic and professional societies\n• Cultural and international clubs\n• Sports and recreation clubs\n• Service and volunteer organizations\n• Arts and performance groups\n• Special interest clubs\n• Honor societies\n\nBenefits of Joining:\n• Meet like-minded students\n• Develop leadership skills\n• Build your resume\n• Network with professionals\n• Have fun and make friends\n• Give back to the community\n\nHow to Get Involved:\n• Attend club fairs and information sessions\n• Visit the Student Activities Office\n• Check our online directory of clubs\n• Contact club leaders directly\n• Start your own club\n\nAll students are encouraged to join at least one organization. It's a great way to enhance your college experience, develop new skills, and build lasting friendships.",
                'category' => 'organizations',
                'slug' => 'clubs-and-organizations',
                'location' => 'Student Activities Office, Student Center',
                'hours' => 'Monday - Friday: 9:00 AM - 5:00 PM',
                'contact_info' => 'Email: activities@example.com\nPhone: (555) 123-4701',
                'website_url' => null,
                'is_active' => true,
            ],
            (object) [
                'id' => 8,
                'title' => 'Volunteer and Community Service',
                'description' => 'Opportunities to give back to the community and make a difference.',
                'content' => "Our Volunteer and Community Service program connects students with meaningful service opportunities both on and off campus. Make a positive impact while building valuable experience.\n\nService Opportunities:\n• Local community service projects\n• Tutoring and mentoring programs\n• Environmental conservation efforts\n• Food bank and shelter support\n• Health and wellness initiatives\n• Educational outreach programs\n• International service trips\n\nBenefits:\n• Make a positive impact\n• Develop leadership and teamwork skills\n• Build your resume\n• Network with community leaders\n• Earn service hours for scholarships\n• Personal fulfillment and growth\n\nHow to Get Involved:\n• Attend service fairs and information sessions\n• Sign up for one-time service events\n• Join ongoing service programs\n• Organize your own service project\n• Participate in service-learning courses\n\nWe coordinate regular service events throughout the semester and maintain partnerships with local nonprofit organizations. All students are welcome to participate, regardless of experience level.",
                'category' => 'organizations',
                'slug' => 'volunteer-community-service',
                'location' => 'Community Engagement Office, Student Center',
                'hours' => 'Monday - Friday: 10:00 AM - 4:00 PM',
                'contact_info' => 'Email: volunteer@example.com\nPhone: (555) 123-4702',
                'website_url' => null,
                'is_active' => true,
            ],
            
            // Additional services (will show in other categories if view supports them)
            (object) [
                'id' => 9,
                'title' => 'Financial Aid',
                'description' => 'Information about scholarships, grants, and financial assistance.',
                'content' => "The Financial Aid Office is committed to making higher education accessible and affordable for all students. We provide comprehensive financial aid services to help students and their families understand and access various funding options.\n\nTypes of Financial Aid Available:\n• Federal Grants (Pell Grant, FSEOG)\n• State Grants and Scholarships\n• Institutional Scholarships\n• Work-Study Programs\n• Federal and Private Student Loans\n• Emergency Financial Assistance\n\nOur Services:\n• Financial aid application assistance (FAFSA)\n• Scholarship search and application support\n• Financial aid award explanation\n• Loan counseling and debt management\n• Payment plan options\n• Financial literacy workshops\n• Budget planning assistance\n\nWe understand that navigating the financial aid process can be overwhelming. Our knowledgeable staff is available to help students understand their financial aid options, complete necessary applications, and make informed decisions about financing their education.\n\nWe encourage all students to apply for financial aid, regardless of their financial situation, as many scholarships and grants are available based on merit, need, or specific criteria.",
                'category' => 'financial',
                'slug' => 'financial-aid',
                'location' => 'Administration Building, Room 101',
                'hours' => 'Monday - Friday: 8:00 AM - 5:00 PM',
                'contact_info' => 'Email: financialaid@example.com\nPhone: (555) 123-4569',
                'website_url' => null,
                'is_active' => true,
            ],
            (object) [
                'id' => 10,
                'title' => 'Health Services',
                'description' => 'On-campus health and wellness services for students.',
                'content' => "Our Health Services Center provides comprehensive medical care, mental health support, and wellness programs to promote the physical and mental well-being of all students.\n\nMedical Services:\n• General health consultations\n• Preventive care and health screenings\n• Immunizations and vaccinations\n• Treatment of minor illnesses and injuries\n• Prescription medication services\n• Laboratory services\n• Referrals to specialists when needed\n\nMental Health Services:\n• Individual counseling sessions\n• Group therapy and support groups\n• Crisis intervention\n• Stress management workshops\n• Substance abuse counseling\n• Mental health screenings\n\nWellness Programs:\n• Health education workshops\n• Nutrition counseling\n• Fitness and exercise programs\n• Smoking cessation support\n• Sexual health education\n• Sleep hygiene programs\n\nOur team of licensed healthcare professionals, including physicians, nurses, and mental health counselors, is dedicated to providing confidential, compassionate care. All services are designed to support students in maintaining their health and wellness while pursuing their academic goals.\n\nEmergency services are available 24/7 for urgent health concerns. For non-emergency appointments, we recommend scheduling in advance to ensure availability.",
                'category' => 'health',
                'slug' => 'health-services',
                'location' => 'Health Center, Ground Floor',
                'hours' => 'Monday - Friday: 8:00 AM - 6:00 PM\nEmergency: 24/7',
                'contact_info' => 'Email: health@example.com\nPhone: (555) 123-4570\nEmergency: (555) 911',
                'website_url' => null,
                'is_active' => true,
            ],
        ]);
    }

    /**
     * Display a listing of all student services
     */
    public function index()
    {
        $services = $this->getStaticData()->groupBy('category');
        return view('student-services.index', compact('services'));
    }

    /**
     * Display the specified student service
     */
    public function show($slug)
    {
        $allServices = $this->getStaticData();
        $service = $allServices->firstWhere('slug', $slug);

        if (!$service) {
            abort(404, 'Service not found');
        }

        // Get other services from the same category
        $relatedServices = $allServices
            ->where('category', $service->category)
            ->where('id', '!=', $service->id)
            ->values();

        return view('student-services.show', compact('service', 'relatedServices'));
    }
}

