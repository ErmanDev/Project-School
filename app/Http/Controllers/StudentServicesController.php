<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StudentService;
use Illuminate\Http\Request;

class StudentServicesController extends Controller
{
    /**
     * Display a listing of all student services
     */
    public function index()
    {
        try {
            $services = StudentService::where('is_active', true)
                ->orderBy('category')
                ->get()
                ->groupBy('category');
        } catch (\Exception $e) {
            // If database is not available, use empty collection
            $services = collect([]);
        }

        return view('student-services.index', compact('services'));
    }

    /**
     * Display the specified student service
     */
    public function show($slug)
    {
        try {
            $service = StudentService::where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail();

            // Get other services from the same category
            $relatedServices = StudentService::where('category', $service->category)
                ->where('id', '!=', $service->id)
                ->where('is_active', true)
                ->orderBy('title')
                ->get();
        } catch (\Exception $e) {
            abort(404, 'Service not found');
        }

        return view('student-services.show', compact('service', 'relatedServices'));
    }
}

