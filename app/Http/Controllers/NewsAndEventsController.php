<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsAndEventsController extends Controller
{
    /**
     * Get static news and events data
     */
    private function getStaticData()
    {
        return collect([
            (object) [
                'id' => 1,
                'title' => 'New Academic Calendar for 2024-2025 Now Available',
                'description' => 'We are pleased to announce the release of the academic calendar for the upcoming academic year.',
                'content' => '<p>The new academic calendar for the 2024-2025 academic year has been published and is now available for download.</p>',
                'category' => 'announcement',
                'slug' => 'new-academic-calendar-2024-2025',
                'featured_image' => null,
                'event_date' => now()->addDays(7),
                'start_time' => '09:00',
                'end_time' => null,
                'location' => 'Main Campus',
                'venue' => 'Administration Building',
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(2),
            ],
            (object) [
                'id' => 2,
                'title' => 'Registration for Spring 2025 Semester Opens Next Week',
                'description' => 'Online registration for the Spring 2025 semester will begin on Monday.',
                'content' => '<p>We are excited to announce that online registration for the Spring 2025 semester will open on Monday, November 11, 2024 at 8:00 AM.</p>',
                'category' => 'announcement',
                'slug' => 'spring-2025-registration',
                'featured_image' => null,
                'event_date' => now()->addDays(10),
                'start_time' => '08:00',
                'end_time' => '17:00',
                'location' => 'Online',
                'venue' => null,
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(1),
            ],
            (object) [
                'id' => 3,
                'title' => 'Annual Science Fair',
                'description' => 'Join us for our annual science fair showcasing student innovations.',
                'content' => '<p>The annual science fair will feature projects from students across all departments.</p>',
                'category' => 'event',
                'slug' => 'annual-science-fair-2024',
                'featured_image' => null,
                'event_date' => now()->addDays(15),
                'start_time' => '09:00',
                'end_time' => '17:00',
                'location' => 'Main Campus',
                'venue' => 'Science Building',
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => true,
                'is_active' => true,
                'published_at' => now()->subDays(10),
            ],
            (object) [
                'id' => 4,
                'title' => 'Campus News: New Library Resources Available',
                'description' => 'The library has added new digital resources and databases for students.',
                'content' => '<p>We are pleased to announce new digital resources and databases available through the campus library.</p>',
                'category' => 'news',
                'slug' => 'new-library-resources',
                'featured_image' => null,
                'event_date' => null,
                'start_time' => null,
                'end_time' => null,
                'location' => null,
                'venue' => null,
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => false,
                'is_active' => true,
                'published_at' => now()->subDays(5),
            ],
            (object) [
                'id' => 5,
                'title' => 'Career Development Workshop',
                'description' => 'A workshop to help students prepare for their future careers.',
                'content' => '<p>Learn essential skills for job searching, resume writing, and interview preparation.</p>',
                'category' => 'event',
                'slug' => 'career-development-workshop',
                'featured_image' => null,
                'event_date' => now()->addDays(20),
                'start_time' => '14:00',
                'end_time' => '16:00',
                'location' => 'Main Campus',
                'venue' => 'Career Center',
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => false,
                'is_active' => true,
                'published_at' => now()->subDays(7),
            ],
            (object) [
                'id' => 6,
                'title' => 'Student Achievement Awards Ceremony',
                'description' => 'Celebrating outstanding student achievements this academic year.',
                'content' => '<p>Join us in celebrating the outstanding achievements of our students.</p>',
                'category' => 'news',
                'slug' => 'student-achievement-awards',
                'featured_image' => null,
                'event_date' => null,
                'start_time' => null,
                'end_time' => null,
                'location' => null,
                'venue' => null,
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => false,
                'is_active' => true,
                'published_at' => now()->subDays(3),
            ],
        ]);
    }

    /**
     * Display a listing of all news and events
     */
    public function index()
    {
        $allItems = $this->getStaticData();
        
        $featuredItems = $allItems->where('is_featured', true)->take(3)->values();
        $news = $allItems->where('category', 'news')->values();
        $events = $allItems->where('category', 'event')->sortBy('event_date')->values();
        $announcements = $allItems->where('category', 'announcement')->take(5)->values();

        return view('news-and-events.index', compact('featuredItems', 'news', 'events', 'announcements'));
    }

    /**
     * Display the specified news or event
     */
    public function show($slug)
    {
        $allItems = $this->getStaticData();
        $item = $allItems->firstWhere('slug', $slug);

        if (!$item) {
            abort(404, 'Content not found');
        }

        // Get related items from the same category
        $relatedItems = $allItems
            ->where('category', $item->category)
            ->where('id', '!=', $item->id)
            ->take(3)
            ->values();

        return view('news-and-events.show', compact('item', 'relatedItems'));
    }
}

