<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionsController extends Controller
{
    /**
     * Get static admission documents data
     */
    private function getStaticData()
    {
        return collect([
            (object) [
                'id' => 1,
                'title' => 'Application Form',
                'description' => 'Download the official application form for admission.',
                'content' => '<p>Please download and complete the application form for admission.</p>',
                'category' => 'forms',
                'slug' => 'application-form',
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 2,
                'title' => 'Requirements Checklist',
                'description' => 'Complete checklist of all required documents for admission.',
                'content' => '<p>Use this checklist to ensure you have all required documents.</p>',
                'category' => 'requirements',
                'slug' => 'requirements-checklist',
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 3,
                'title' => 'Scholarship Application',
                'description' => 'Application form for scholarship programs.',
                'content' => '<p>Apply for available scholarship programs using this form.</p>',
                'category' => 'forms',
                'slug' => 'scholarship-application',
                'is_active' => true,
                'order' => 2,
            ],
            (object) [
                'id' => 4,
                'title' => 'Admission Guidelines',
                'description' => 'Comprehensive guide to the admission process.',
                'content' => '<p>This guide will help you navigate the admission process step by step.</p>',
                'category' => 'guidelines',
                'slug' => 'admission-guidelines',
                'is_active' => true,
                'order' => 1,
            ],
        ]);
    }

    /**
     * Display a listing of all admission resources
     */
    public function index()
    {
        $documents = $this->getStaticData()->groupBy('category');
        return view('admissions.index', compact('documents'));
    }

    /**
     * Display the specified admission document
     */
    public function show($slug)
    {
        $allDocuments = $this->getStaticData();
        $document = $allDocuments->firstWhere('slug', $slug);

        if (!$document) {
            abort(404, 'Document not found');
        }

        // Get other documents from the same category
        $relatedDocuments = $allDocuments
            ->where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->values();

        return view('admissions.show', compact('document', 'relatedDocuments'));
    }
}

