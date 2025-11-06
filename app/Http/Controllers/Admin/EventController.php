<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsAndEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of events.
     */
    public function index()
    {
        $events = NewsAndEvent::where('category', 'event')->orderBy('event_date', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created event.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news_and_events,slug',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'event_date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'location' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'registration_url' => 'nullable|url',
            'requires_registration' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'youtube_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('events/images', 'public');
        }

        // Handle gallery images upload
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $galleryImages[] = $file->store('events/gallery', 'public');
            }
        }
        $validated['gallery_images'] = $galleryImages;

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['category'] = 'event';
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['requires_registration'] = $request->has('requires_registration');
        $validated['published_at'] = $validated['published_at'] ?? now();

        NewsAndEvent::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(NewsAndEvent $event)
    {
        if ($event->category !== 'event') {
            return redirect()->route('admin.events.index')->with('error', 'Event not found.');
        }
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified event.
     */
    public function update(Request $request, NewsAndEvent $event)
    {
        if ($event->category !== 'event') {
            return redirect()->route('admin.events.index')->with('error', 'Event not found.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news_and_events,slug,' . $event->id,
            'description' => 'nullable|string',
            'content' => 'required|string',
            'event_date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
            'location' => 'nullable|string|max:255',
            'venue' => 'nullable|string|max:255',
            'registration_url' => 'nullable|url',
            'requires_registration' => 'boolean',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'youtube_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
            'is_active' => 'boolean',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            if ($event->featured_image) {
                Storage::disk('public')->delete($event->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('events/images', 'public');
        } else {
            $validated['featured_image'] = $event->featured_image;
        }

        // Handle gallery images removal
        $galleryImages = $event->gallery_images ?? [];
        if ($request->has('remove_gallery_images') && is_array($request->remove_gallery_images)) {
            $imagesToRemove = array_map('intval', $request->remove_gallery_images);
            $galleryImages = array_filter($galleryImages, function($image, $index) use ($imagesToRemove) {
                if (in_array($index, $imagesToRemove)) {
                    Storage::disk('public')->delete($image);
                    return false;
                }
                return true;
            }, ARRAY_FILTER_USE_BOTH);
            $galleryImages = array_values($galleryImages);
        }

        // Handle new gallery images upload
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $galleryImages[] = $file->store('events/gallery', 'public');
            }
        }
        $validated['gallery_images'] = $galleryImages;

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['requires_registration'] = $request->has('requires_registration');

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified event.
     */
    public function destroy(NewsAndEvent $event)
    {
        if ($event->category !== 'event') {
            return redirect()->route('admin.events.index')->with('error', 'Event not found.');
        }

        // Delete featured image
        if ($event->featured_image) {
            Storage::disk('public')->delete($event->featured_image);
        }

        // Delete gallery images
        if ($event->gallery_images) {
            foreach ($event->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}

