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
        $documents = AdmissionDocument::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->groupBy('category');

        return view('admissions.index', compact('documents'));
    }

    /**
     * Display the specified admission document
     */
    public function show($slug)
    {
        $document = AdmissionDocument::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Get other documents from the same category
        $relatedDocuments = AdmissionDocument::where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('admissions.show', compact('document', 'relatedDocuments'));
    }
}

