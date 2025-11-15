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
                'content' => '<p>Our academic advisors help students plan their academic journey and select appropriate courses. We provide personalized guidance to help you achieve your educational goals.</p>',
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
                'content' => '<p>Our career counselors provide guidance on career exploration and job search strategies. We help students identify career paths and develop professional skills.</p>',
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
                'content' => '<p>Learn about available financial aid options and how to apply for scholarships and grants. Our financial aid office assists students in securing funding for their education.</p>',
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
                'content' => '<p>Access to health services, counseling, and wellness programs. Our health center provides medical care, mental health support, and wellness resources.</p>',
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

