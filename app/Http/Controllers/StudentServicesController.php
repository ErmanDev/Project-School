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
            (object) [
                'id' => 1,
                'title' => 'Academic Advising',
                'description' => 'Get guidance on course selection and academic planning.',
                'content' => "Our Academic Advising Office is dedicated to helping students navigate their educational journey successfully. Our experienced advisors work one-on-one with students to develop personalized academic plans that align with their career goals and interests.\n\nServices We Provide:\n• Course selection and registration assistance\n• Degree planning and program requirements\n• Academic progress monitoring\n• Major and minor exploration\n• Transfer credit evaluation\n• Academic policy interpretation\n• Study skills and time management strategies\n\nOur advisors are available for both scheduled appointments and walk-in consultations. We encourage students to meet with their advisor at least once per semester to ensure they stay on track for graduation.\n\nWhether you're a new student exploring your options or a continuing student planning for your next semester, our academic advisors are here to support your success.",
                'category' => 'academic',
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
                'description' => 'Explore career options and plan your professional future.',
                'content' => "The Career Counseling Center provides comprehensive career development services to help students explore career options, develop professional skills, and successfully transition from college to career.\n\nOur Services Include:\n• Career assessment and exploration\n• Resume and cover letter writing assistance\n• Interview preparation and mock interviews\n• Job search strategies and techniques\n• Internship and co-op program coordination\n• Networking opportunities and career fairs\n• Professional development workshops\n• Graduate school application support\n• Salary negotiation guidance\n\nWe offer individual career counseling sessions where students can discuss their career goals, interests, and concerns. Our career counselors help students identify their strengths, explore various career paths, and develop action plans for achieving their professional objectives.\n\nAdditionally, we maintain partnerships with employers and host regular career fairs, networking events, and employer information sessions to connect students with potential opportunities.",
                'category' => 'career',
                'slug' => 'career-counseling',
                'location' => 'Career Center, Room 305',
                'hours' => 'Monday - Friday: 9:00 AM - 4:00 PM',
                'contact_info' => 'Email: career@example.com\nPhone: (555) 123-4568',
                'website_url' => null,
                'is_active' => true,
            ],
            (object) [
                'id' => 3,
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
                'id' => 4,
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

