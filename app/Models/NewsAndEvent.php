<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsAndEvent extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'category', // 'news', 'event', 'announcement'
        'event_date',
        'start_time',
        'end_time',
        'location',
        'venue',
        'registration_url',
        'requires_registration',
        'featured_image',
        'gallery_images',
        'youtube_url',
        'is_featured',
        'published_at',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_alumni' => 'boolean',
        'requires_registration' => 'boolean',
        'event_date' => 'datetime',
        'published_at' => 'datetime',
        'gallery_images' => 'array',
    ];

    // Generate slug automatically from title
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = \Str::slug($model->title);
            }
            
            if (empty($model->published_at)) {
                $model->published_at = now();
            }
        });
    }
}

