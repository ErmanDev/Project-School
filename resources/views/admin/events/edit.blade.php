<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Event') }}
            </h2>
            <a href="{{ route('admin.events.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                ← Back to Events
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 lg:p-8">
                    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Basic Information Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Basic Information</h3>
                            
                            <div class="space-y-6">
                                <!-- Title -->
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" required class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                                    <textarea name="description" id="description" rows="3" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('description', $event->description) }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Event Details Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Event Details</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Event Date -->
                                <div>
                                    <label for="event_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Event Date <span class="text-red-500">*</span></label>
                                    <input type="date" name="event_date" id="event_date" value="{{ old('event_date', $event->event_date ? $event->event_date->format('Y-m-d') : '') }}" required class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('event_date')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Start Time -->
                                <div>
                                    <label for="start_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start Time</label>
                                    <input type="time" name="start_time" id="start_time" value="{{ old('start_time', $event->start_time) }}" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('start_time')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- End Time -->
                                <div>
                                    <label for="end_time" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">End Time</label>
                                    <input type="time" name="end_time" id="end_time" value="{{ old('end_time', $event->end_time) }}" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('end_time')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Location -->
                                <div>
                                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Location</label>
                                    <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('location')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Venue -->
                                <div>
                                    <label for="venue" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Venue</label>
                                    <input type="text" name="venue" id="venue" value="{{ old('venue', $event->venue) }}" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('venue')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Registration URL -->
                                <div>
                                    <label for="registration_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Registration URL</label>
                                    <input type="url" name="registration_url" id="registration_url" value="{{ old('registration_url', $event->registration_url) }}" placeholder="https://..." class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('registration_url')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Requires Registration -->
                            <div class="mt-4">
                                <label class="flex items-center">
                                    <input type="checkbox" name="requires_registration" value="1" {{ old('requires_registration', $event->requires_registration) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    <span class="ml-3 text-sm text-gray-700 dark:text-gray-300">Requires Registration</span>
                                </label>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Content</h3>
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Content <span class="text-red-500">*</span></label>
                                
                                <!-- Rich Text Editor Toolbar -->
                                <div class="mb-2 border border-gray-300 dark:border-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-900 p-2 flex flex-wrap gap-1">
                                    <button type="button" onclick="formatDoc('bold')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Bold">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h8a4 4 0 014 4 4 4 0 01-4 4H6z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12h9a4 4 0 014 4 4 4 0 01-4 4H6z"></path></svg>
                                    </button>
                                    <button type="button" onclick="formatDoc('italic')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Italic">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                                    </button>
                                    <button type="button" onclick="formatDoc('underline')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Underline">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </button>
                                    <div class="border-l border-gray-300 dark:border-gray-600 mx-1"></div>
                                    <button type="button" onclick="formatDoc('justifyLeft')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Align Left">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                                    </button>
                                    <button type="button" onclick="formatDoc('justifyCenter')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Align Center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                                    </button>
                                    <button type="button" onclick="formatDoc('justifyRight')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Align Right">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                                    </button>
                                    <div class="border-l border-gray-300 dark:border-gray-600 mx-1"></div>
                                    <button type="button" onclick="formatDoc('insertUnorderedList')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Bullet List">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                                    </button>
                                    <button type="button" onclick="formatDoc('insertOrderedList')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Numbered List">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 2l4 16M6 9h14M4 15h14"></path></svg>
                                    </button>
                                    <div class="border-l border-gray-300 dark:border-gray-600 mx-1"></div>
                                    <button type="button" onclick="insertLink()" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Insert Link">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                                    </button>
                                    <button type="button" onclick="formatDoc('formatBlock', '<h1>')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded text-xs font-bold" title="Heading 1">H1</button>
                                    <button type="button" onclick="formatDoc('formatBlock', '<h2>')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded text-xs font-bold" title="Heading 2">H2</button>
                                    <button type="button" onclick="formatDoc('formatBlock', '<h3>')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded text-xs font-bold" title="Heading 3">H3</button>
                                    <div class="border-l border-gray-300 dark:border-gray-600 mx-1"></div>
                                    <button type="button" onclick="formatDoc('removeFormat')" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded text-xs" title="Remove Formatting">Clear</button>
                                    <div class="border-l border-gray-300 dark:border-gray-600 mx-1"></div>
                                    <button type="button" onclick="showPreview()" class="p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded" title="Preview">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    </button>
                                </div>

                                <!-- Editor Area -->
                                <div 
                                    id="contentEditor" 
                                    contenteditable="true"
                                    class="min-h-[400px] p-4 border border-gray-300 dark:border-gray-700 rounded-b-lg bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                    style="outline: none;"
                                ></div>
                                
                                <!-- Hidden textarea to store content for form submission -->
                                <textarea name="content" id="content" required style="display: none;">{{ old('content', $event->content) }}</textarea>
                                
                                @error('content')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Media Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Media</h3>
                            
                            <div class="space-y-6">
                                <!-- Featured Image -->
                                <div>
                                    <label for="featured_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Featured Image</label>
                                    @if($event->featured_image)
                                        <div class="mb-3" id="current_featured_image">
                                            <img src="{{ asset('storage/' . $event->featured_image) }}" alt="Current featured image" class="h-40 w-full object-cover rounded-lg border border-gray-300 dark:border-gray-600">
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Current image</p>
                                        </div>
                                    @endif
                                    <!-- Image Preview Container -->
                                    <div id="featured_image_preview" class="mb-3 grid grid-cols-2 md:grid-cols-3 gap-3 hidden"></div>
                                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-indigo-400 transition-colors {{ $event->featured_image ? 'border-t-0 rounded-t-none' : '' }}" id="featured_image_upload_area">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                                <label for="featured_image" class="relative cursor-pointer rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>{{ $event->featured_image ? 'Replace image' : 'Upload an image' }}</span>
                                                    <input type="file" name="featured_image" id="featured_image" accept="image/*" multiple class="sr-only">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF, WEBP up to 2MB</p>
                                        </div>
                                    </div>
                                    @error('featured_image')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Gallery Images -->
                                <div>
                                    <label for="gallery_images" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Gallery Images</label>
                                    @if($event->gallery_images && count($event->gallery_images) > 0)
                                        <div class="mb-3 grid grid-cols-3 gap-3" id="current_gallery_images">
                                            @foreach($event->gallery_images as $index => $image)
                                                <div class="relative">
                                                    <img src="{{ asset('storage/' . $image) }}" alt="Gallery image {{ $index + 1 }}" class="w-full h-24 object-cover rounded-lg border border-gray-300 dark:border-gray-600">
                                                    <label class="absolute top-1 right-1 flex items-center">
                                                        <input type="checkbox" name="remove_gallery_images[]" value="{{ $index }}" class="h-4 w-4 rounded border-gray-300 text-red-600 focus:ring-red-500">
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <p class="mb-2 text-xs text-gray-500 dark:text-gray-400">Check images to remove</p>
                                    @endif
                                    <!-- Gallery Preview Container -->
                                    <div id="gallery_images_preview" class="mb-3 grid grid-cols-2 md:grid-cols-3 gap-3 hidden"></div>
                                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-indigo-400 transition-colors" id="gallery_images_upload_area">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                                <label for="gallery_images" class="relative cursor-pointer rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload images</span>
                                                    <input type="file" name="gallery_images[]" id="gallery_images" multiple accept="image/*" class="sr-only">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF, WEBP up to 2MB each</p>
                                        </div>
                                    </div>
                                    @error('gallery_images.*')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- YouTube URL -->
                                <div>
                                    <label for="youtube_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">YouTube URL</label>
                                    <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $event->youtube_url) }}" placeholder="https://www.youtube.com/watch?v=..." class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('youtube_url')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Settings Section -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">Settings</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Published At -->
                                <div>
                                    <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Published Date</label>
                                    <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', $event->published_at ? $event->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    @error('published_at')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Is Featured & Is Active -->
                                <div class="space-y-4">
                                    <div>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $event->is_featured) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <span class="ml-3 text-sm text-gray-700 dark:text-gray-300">Featured</span>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $event->is_active) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <span class="ml-3 text-sm text-gray-700 dark:text-gray-300">Active</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('admin.events.index') }}" class="px-6 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit" class="px-6 py-2.5 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Rich Text Editor Script -->
    <script>
        // Format document using execCommand
        function formatDoc(cmd, value = null) {
            document.execCommand(cmd, false, value);
            document.getElementById('contentEditor').focus();
            updateContent();
        }

        // Insert link
        function insertLink() {
            const url = prompt('Enter URL:', 'https://');
            if (url) {
                document.execCommand('createLink', false, url);
                updateContent();
            }
        }

        // Show preview
        function showPreview() {
            const editor = document.getElementById('contentEditor');
            const previewContent = document.getElementById('previewContent');
            const previewImages = document.getElementById('previewImages');
            const modal = document.getElementById('previewModal');
            const currentFeaturedImage = document.getElementById('current_featured_image');
            const currentGalleryImages = document.getElementById('current_gallery_images');
            
            updateContent(); // Ensure content is synced
            previewContent.innerHTML = editor.innerHTML || '<p class="text-gray-500 dark:text-gray-400">No content to preview</p>';
            
            let imagesHTML = '';
            
            // Add featured images preview (new or current)
            if (featuredImageFiles && featuredImageFiles.length > 0) {
                imagesHTML += '<div class="mb-4"><h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">New Featured Images</h4><div class="grid grid-cols-2 md:grid-cols-3 gap-3">';
                previewImages.innerHTML = imagesHTML + '</div></div>';
                previewImages.style.display = 'block';
                
                featuredImageFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const gridContainer = previewImages.querySelector('.grid');
                        if (gridContainer) {
                            const imgDiv = document.createElement('div');
                            imgDiv.className = 'relative';
                            imgDiv.innerHTML = `<img src="${e.target.result}" alt="Featured ${index + 1}" class="w-full h-32 object-contain rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700">`;
                            gridContainer.appendChild(imgDiv);
                        }
                    };
                    reader.readAsDataURL(file);
                });
            } else if (currentFeaturedImage) {
                const currentImg = currentFeaturedImage.querySelector('img');
                if (currentImg) {
                    imagesHTML = '<div class="mb-4"><h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Current Featured Image</h4><div class="grid grid-cols-2 md:grid-cols-3 gap-3"><div class="relative"><img src="' + currentImg.src + '" alt="Current featured image" class="w-full h-32 object-contain rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700"></div></div></div>';
                    previewImages.innerHTML = imagesHTML;
                    previewImages.style.display = 'block';
                }
            }
            
            // Add gallery images preview (new or current)
            if (galleryImageFiles && galleryImageFiles.length > 0) {
                const existingHTML = previewImages.innerHTML;
                const galleryHTML = '<div class="mb-4' + (imagesHTML ? ' mt-4' : '') + '"><h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">New Gallery Images</h4><div class="grid grid-cols-2 md:grid-cols-3 gap-3">';
                previewImages.innerHTML = existingHTML + galleryHTML + '</div></div>';
                previewImages.style.display = 'block';
                
                galleryImageFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const grids = previewImages.querySelectorAll('.grid');
                        const galleryGrid = grids[grids.length - 1];
                        if (galleryGrid) {
                            const imgDiv = document.createElement('div');
                            imgDiv.className = 'relative';
                            imgDiv.innerHTML = `<img src="${e.target.result}" alt="Gallery ${index + 1}" class="w-full h-32 object-contain rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700">`;
                            galleryGrid.appendChild(imgDiv);
                        }
                    };
                    reader.readAsDataURL(file);
                });
            } else if (currentGalleryImages && currentGalleryImages.querySelectorAll('img').length > 0) {
                const imgs = currentGalleryImages.querySelectorAll('img');
                if (imgs.length > 0) {
                    let galleryHTML = '<div class="mb-4' + (imagesHTML ? ' mt-4' : '') + '"><h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Current Gallery Images</h4><div class="grid grid-cols-2 md:grid-cols-3 gap-3">';
                    imgs.forEach(img => {
                        galleryHTML += '<div class="relative"><img src="' + img.src + '" alt="Gallery image" class="w-full h-32 object-contain rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700"></div>';
                    });
                    galleryHTML += '</div></div>';
                    previewImages.innerHTML = (previewImages.innerHTML || '') + galleryHTML;
                    previewImages.style.display = 'block';
                }
            }
            
            if (!imagesHTML && (!featuredImageFiles || featuredImageFiles.length === 0) && (!galleryImageFiles || galleryImageFiles.length === 0) && (!currentFeaturedImage) && (!currentGalleryImages || currentGalleryImages.querySelectorAll('img').length === 0)) {
                previewImages.innerHTML = '';
                previewImages.style.display = 'none';
            }
            
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        // Close preview
        function closePreview() {
            const modal = document.getElementById('previewModal');
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Update hidden textarea with editor content
        function updateContent() {
            const editor = document.getElementById('contentEditor');
            const textarea = document.getElementById('content');
            textarea.value = editor.innerHTML;
        }

        // Initialize editor
        document.addEventListener('DOMContentLoaded', function() {
            const editor = document.getElementById('contentEditor');
            const textarea = document.getElementById('content');
            
            // Load existing content if any
            if (textarea.value) {
                editor.innerHTML = textarea.value;
            }

            // Update textarea on input
            editor.addEventListener('input', updateContent);
            editor.addEventListener('paste', function(e) {
                e.preventDefault();
                const text = (e.clipboardData || window.clipboardData).getData('text/plain');
                document.execCommand('insertText', false, text);
                updateContent();
            });

            // Update textarea before form submit
            const form = editor.closest('form');
            if (form) {
                form.addEventListener('submit', function() {
                    updateContent();
                });
            }

            // Focus editor on load
            editor.focus();

            // Close preview on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closePreview();
                }
            });

            // Image preview functionality for featured image
            const featuredImageInput = document.getElementById('featured_image');
            const featuredImagePreview = document.getElementById('featured_image_preview');
            const featuredImageUploadArea = document.getElementById('featured_image_upload_area');
            const currentFeaturedImage = document.getElementById('current_featured_image');
            let featuredImageFiles = [];

            function renderFeaturedImagePreviews() {
                featuredImagePreview.innerHTML = '';
                if (featuredImageFiles.length > 0) {
                    featuredImagePreview.classList.remove('hidden');
                    featuredImageUploadArea.classList.add('border-t-0', 'rounded-t-none');
                    if (currentFeaturedImage) {
                        currentFeaturedImage.style.display = 'none';
                    }
                    
                    featuredImageFiles.forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const previewDiv = document.createElement('div');
                            previewDiv.className = 'relative group';
                            previewDiv.innerHTML = `
                                <img src="${e.target.result}" alt="Preview ${index + 1}" class="w-full h-32 object-contain rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700">
                                <button type="button" onclick="removeFeaturedImage(${index})" class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-700" title="Remove image">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            `;
                            featuredImagePreview.appendChild(previewDiv);
                        };
                        reader.readAsDataURL(file);
                    });
                } else {
                    featuredImagePreview.classList.add('hidden');
                    if (currentFeaturedImage) {
                        currentFeaturedImage.style.display = 'block';
                    }
                    if (!currentFeaturedImage || currentFeaturedImage.style.display === 'none') {
                        featuredImageUploadArea.classList.remove('border-t-0', 'rounded-t-none');
                    }
                }
            }

            function removeFeaturedImage(index) {
                featuredImageFiles.splice(index, 1);
                renderFeaturedImagePreviews();
                
                const dataTransfer = new DataTransfer();
                featuredImageFiles.forEach(file => dataTransfer.items.add(file));
                featuredImageInput.files = dataTransfer.files;
            }

            window.removeFeaturedImage = removeFeaturedImage;

            if (featuredImageInput) {
                featuredImageInput.addEventListener('change', function(e) {
                    const files = Array.from(e.target.files);
                    featuredImageFiles = [...featuredImageFiles, ...files];
                    renderFeaturedImagePreviews();
                });
            }

            // Gallery images preview functionality
            const galleryImagesInput = document.getElementById('gallery_images');
            const galleryImagesPreview = document.getElementById('gallery_images_preview');
            const galleryImagesUploadArea = document.getElementById('gallery_images_upload_area');
            const currentGalleryImages = document.getElementById('current_gallery_images');
            let galleryImageFiles = [];

            function renderGalleryImagePreviews() {
                galleryImagesPreview.innerHTML = '';
                if (galleryImageFiles.length > 0) {
                    galleryImagesPreview.classList.remove('hidden');
                    galleryImagesUploadArea.classList.add('border-t-0', 'rounded-t-none');
                    
                    galleryImageFiles.forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const previewDiv = document.createElement('div');
                            previewDiv.className = 'relative group';
                            previewDiv.innerHTML = `
                                <img src="${e.target.result}" alt="Preview ${index + 1}" class="w-full h-32 object-contain rounded-lg border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700">
                                <button type="button" onclick="removeGalleryImage(${index})" class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-700" title="Remove image">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            `;
                            galleryImagesPreview.appendChild(previewDiv);
                        };
                        reader.readAsDataURL(file);
                    });
                } else {
                    galleryImagesPreview.classList.add('hidden');
                    if (!currentGalleryImages || currentGalleryImages.querySelectorAll('img').length === 0) {
                        galleryImagesUploadArea.classList.remove('border-t-0', 'rounded-t-none');
                    }
                }
            }

            function removeGalleryImage(index) {
                galleryImageFiles.splice(index, 1);
                renderGalleryImagePreviews();
                
                const dataTransfer = new DataTransfer();
                galleryImageFiles.forEach(file => dataTransfer.items.add(file));
                galleryImagesInput.files = dataTransfer.files;
            }

            window.removeGalleryImage = removeGalleryImage;

            if (galleryImagesInput) {
                galleryImagesInput.addEventListener('change', function(e) {
                    const files = Array.from(e.target.files);
                    galleryImageFiles = [...galleryImageFiles, ...files];
                    renderGalleryImagePreviews();
                });
            }
        });
    </script>

    <!-- Preview Modal -->
    <div id="previewModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 dark:bg-gray-900 bg-opacity-75 dark:bg-opacity-75" onclick="closePreview()"></div>
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Content Preview</h3>
                        <button onclick="closePreview()" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div id="previewContent" class="prose dark:prose-invert max-w-none p-4 border border-gray-200 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-900 min-h-[400px] max-h-[600px] overflow-y-auto">
                        <!-- Preview content will be inserted here -->
                    </div>
                    <div id="previewImages" class="mt-4 px-4">
                        <!-- Image previews will be inserted here -->
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button onclick="closePreview()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



















