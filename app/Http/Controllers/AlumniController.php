<?php

namespace App\Http\Controllers;

use App\Models\NewsAndEvent;

class AlumniController extends Controller
{
    public function index()
    {
        $alumniItems = NewsAndEvent::where('is_active', true)
            ->where('is_alumni', true)
            ->orderByDesc('published_at')
            ->paginate(9);

        $alumniSiteUrl = config('app.alumni_url', 'https://alumni.example.edu');

        return view('alumni.index', compact('alumniItems', 'alumniSiteUrl'));
    }
}


