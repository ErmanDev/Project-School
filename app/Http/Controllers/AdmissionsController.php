<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AdmissionDocument;
use Illuminate\Http\Request;

class AdmissionsController extends Controller
{
    /**
     * Display a listing of all admission resources
     */
    public function index()
    {
        try {
            $documents = AdmissionDocument::where('is_active', true)
                ->orderBy('order')
                ->get()
                ->groupBy('category');
        } catch (\Exception $e) {
            // If database is not available, use empty collection
            $documents = collect([]);
        }

        return view('admissions.index', compact('documents'));
    }

    /**
     * Display the specified admission document
     */
    public function show($slug)
    {
        try {
            $document = AdmissionDocument::where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail();

            // Get other documents from the same category
            $relatedDocuments = AdmissionDocument::where('category', $document->category)
                ->where('id', '!=', $document->id)
                ->where('is_active', true)
                ->orderBy('order')
                ->get();
        } catch (\Exception $e) {
            abort(404, 'Document not found');
        }

        return view('admissions.show', compact('document', 'relatedDocuments'));
    }
}

