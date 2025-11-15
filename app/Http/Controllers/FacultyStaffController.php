<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\FacultyStaff;
use Illuminate\Http\Request;

class FacultyStaffController extends Controller
{
    public function index()
    {
        try {
            $departments = Department::with(['facultyAndStaff' => function ($q) {
                $q->orderBy('name');
            }])->orderBy('name')->get();
        } catch (\Exception $e) {
            // If database is not available, use empty collection
            $departments = collect([]);
        }

        return view('faculty-staff.index', compact('departments'));
    }

    public function showDepartment(string $slug)
    {
        try {
            $department = Department::where('slug', $slug)
                ->with(['facultyAndStaff' => function ($q) {
                    $q->orderBy('type')->orderBy('name');
                }])
                ->firstOrFail();
        } catch (\Exception $e) {
            abort(404, 'Department not found');
        }

        return view('faculty-staff.department', compact('department'));
    }

    public function showPerson(string $slug)
    {
        try {
            $person = FacultyStaff::where('slug', $slug)->with('department')->firstOrFail();
        } catch (\Exception $e) {
            abort(404, 'Person not found');
        }
        return view('faculty-staff.show', compact('person'));
    }
}


