<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NewsAndEvent;
use Illuminate\Http\Request;

class NewsAndEventsController extends Controller
{
    /**
     * Display a listing of all news and events
     */
    public function index()
    {
        $featuredItems = NewsAndEvent::where('is_active', true)
            ->where('is_featured', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $news = NewsAndEvent::where('is_active', true)
            ->where('category', 'news')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        $events = NewsAndEvent::where('is_active', true)
            ->where('category', 'event')
            ->where('published_at', '<=', now())
            ->orderBy('event_date', 'asc')
            ->get();

        $announcements = NewsAndEvent::where('is_active', true)
            ->where('category', 'announcement')
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return view('news-and-events.index', compact('featuredItems', 'news', 'events', 'announcements'));
    }

    /**
     * Display the specified news or event
     */
    public function show($slug)
    {
        $item = NewsAndEvent::where('slug', $slug)
            ->where('is_active', true)
            ->where('published_at', '<=', now())
            ->firstOrFail();

        // Get related items from the same category
        $relatedItems = NewsAndEvent::where('category', $item->category)
            ->where('id', '!=', $item->id)
            ->where('is_active', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('news-and-events.show', compact('item', 'relatedItems'));
    }
}

