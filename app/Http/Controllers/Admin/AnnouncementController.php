<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsAndEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = NewsAndEvent::where('category', 'announcement')->orderBy('created_at', 'desc')->get();
        return view('admin.announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news_and_events,slug',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'event_date' => 'nullable|date',
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
            $validated['featured_image'] = $request->file('featured_image')->store('announcements/images', 'public');
        }

        // Handle gallery images upload
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $galleryImages[] = $file->store('announcements/gallery', 'public');
            }
        }
        $validated['gallery_images'] = $galleryImages;

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['category'] = 'announcement';
        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['requires_registration'] = $request->has('requires_registration');
        $validated['published_at'] = $validated['published_at'] ?? now();

        NewsAndEvent::create($validated);

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsAndEvent $announcement)
    {
        return view('admin.announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsAndEvent $announcement)
    {
        return view('admin.announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsAndEvent $announcement)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news_and_events,slug,' . $announcement->id,
            'description' => 'nullable|string',
            'content' => 'required|string',
            'event_date' => 'nullable|date',
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
            if ($announcement->featured_image) {
                Storage::disk('public')->delete($announcement->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('announcements/images', 'public');
        } else {
            // Preserve existing image if not updating
            $validated['featured_image'] = $announcement->featured_image;
        }

        // Handle gallery images removal
        $galleryImages = $announcement->gallery_images ?? [];
        if ($request->has('remove_gallery_images') && is_array($request->remove_gallery_images)) {
            $imagesToRemove = array_map('intval', $request->remove_gallery_images);
            $galleryImages = array_filter($galleryImages, function($image, $index) use ($imagesToRemove) {
                if (in_array($index, $imagesToRemove)) {
                    // Delete the image from storage
                    Storage::disk('public')->delete($image);
                    return false;
                }
                return true;
            }, ARRAY_FILTER_USE_BOTH);
            // Re-index array
            $galleryImages = array_values($galleryImages);
        }

        // Handle new gallery images upload
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                $galleryImages[] = $file->store('announcements/gallery', 'public');
            }
        }
        $validated['gallery_images'] = $galleryImages;

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');
        $validated['requires_registration'] = $request->has('requires_registration');

        $announcement->update($validated);

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsAndEvent $announcement)
    {
        // Delete featured image
        if ($announcement->featured_image) {
            Storage::disk('public')->delete($announcement->featured_image);
        }

        // Delete gallery images
        if ($announcement->gallery_images) {
            foreach ($announcement->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement deleted successfully.');
    }
}
