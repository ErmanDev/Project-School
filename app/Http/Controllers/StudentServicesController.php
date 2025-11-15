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
                'content' => '<p>Our academic advisors help students plan their academic journey and select appropriate courses.</p>',
                'category' => 'academic',
                'slug' => 'academic-advising',
                'is_active' => true,
            ],
            (object) [
                'id' => 2,
                'title' => 'Career Counseling',
                'description' => 'Explore career options and plan your professional future.',
                'content' => '<p>Our career counselors provide guidance on career exploration and job search strategies.</p>',
                'category' => 'career',
                'slug' => 'career-counseling',
                'is_active' => true,
            ],
            (object) [
                'id' => 3,
                'title' => 'Financial Aid',
                'description' => 'Information about scholarships, grants, and financial assistance.',
                'content' => '<p>Learn about available financial aid options and how to apply for scholarships and grants.</p>',
                'category' => 'financial',
                'slug' => 'financial-aid',
                'is_active' => true,
            ],
            (object) [
                'id' => 4,
                'title' => 'Health Services',
                'description' => 'On-campus health and wellness services for students.',
                'content' => '<p>Access to health services, counseling, and wellness programs.</p>',
                'category' => 'health',
                'slug' => 'health-services',
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

