<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentService extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'category', // 'guidance', 'library', 'organizations'
        'contact_info',
        'hours',
        'location',
        'website_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Generate slug automatically from title
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = \Str::slug($model->title);
            }
        });
    }
}

