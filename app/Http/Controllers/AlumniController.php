<?php

namespace App\Http\Controllers;

use App\Models\NewsAndEvent;

class AlumniController extends Controller
{
    public function index()
    {
        try {
            $alumniItems = NewsAndEvent::where('is_active', true)
                ->where('is_alumni', true)
                ->orderByDesc('published_at')
                ->paginate(9);
        } catch (\Exception $e) {
            // If database is not available, use empty collection
            $alumniItems = collect([]);
        }

        $alumniSiteUrl = config('app.alumni_url', 'https://alumni.example.edu');

        return view('alumni.index', compact('alumniItems', 'alumniSiteUrl'));
    }
}


