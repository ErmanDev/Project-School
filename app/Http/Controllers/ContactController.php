<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        // Static departments data
        $departments = collect([
            (object) ['id' => 1, 'name' => 'Administration', 'slug' => 'administration'],
            (object) ['id' => 2, 'name' => 'Academic Affairs', 'slug' => 'academic-affairs'],
            (object) ['id' => 3, 'name' => 'Student Services', 'slug' => 'student-services'],
            (object) ['id' => 4, 'name' => 'Admissions', 'slug' => 'admissions'],
            (object) ['id' => 5, 'name' => 'Registrar', 'slug' => 'registrar'],
        ]);
        
        $mapsEmbedUrl = config('services.google.maps_embed_url');
        return view('contact.index', compact('departments', 'mapsEmbedUrl'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $toAddress = config('mail.contact_to') ?? config('mail.from.address') ?? 'admin@example.com';

        Mail::to($toAddress)->send(new ContactMessageSubmitted($data));

        return back()->with('status', 'Thank you! Your message has been sent.');
    }
}


