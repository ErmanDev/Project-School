<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionDocument extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category', // 'guideline', 'form', 'requirement'
        'download_url',
        'content',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
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
