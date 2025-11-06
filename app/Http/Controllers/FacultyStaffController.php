<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\FacultyStaff;
use Illuminate\Http\Request;

class FacultyStaffController extends Controller
{
    public function index()
    {
        $departments = Department::with(['facultyAndStaff' => function ($q) {
            $q->orderBy('name');
        }])->orderBy('name')->get();

        return view('faculty-staff.index', compact('departments'));
    }

    public function showDepartment(string $slug)
    {
        $department = Department::where('slug', $slug)
            ->with(['facultyAndStaff' => function ($q) {
                $q->orderBy('type')->orderBy('name');
            }])
            ->firstOrFail();

        return view('faculty-staff.department', compact('department'));
    }

    public function showPerson(string $slug)
    {
        $person = FacultyStaff::where('slug', $slug)->with('department')->firstOrFail();
        return view('faculty-staff.show', compact('person'));
    }
}


