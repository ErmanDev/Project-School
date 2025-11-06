<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FacultyStaff extends Model
{
    use HasFactory;

    protected $table = 'faculty_staff';

    protected $fillable = [
        'department_id',
        'type',
        'name',
        'slug',
        'title',
        'email',
        'phone',
        'office_location',
        'office_hours',
        'photo_path',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}


