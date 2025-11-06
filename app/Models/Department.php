<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone',
        'office_location',
        'office_hours',
    ];

    public function facultyAndStaff(): HasMany
    {
        return $this->hasMany(FacultyStaff::class);
    }
}


