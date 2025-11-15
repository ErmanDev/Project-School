<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyStaffController extends Controller
{
    /**
     * Get static departments and faculty data
     */
    private function getStaticData()
    {
        return collect([
            (object) [
                'id' => 1,
                'name' => 'Computer Science',
                'slug' => 'computer-science',
                'description' => 'Department of Computer Science',
                'office_location' => 'Science Building, Room 301',
                'facultyAndStaff' => collect([
                    (object) [
                        'id' => 1,
                        'name' => 'Dr. John Smith',
                        'slug' => 'dr-john-smith',
                        'type' => 'faculty',
                        'position' => 'Professor',
                        'email' => 'john.smith@example.com',
                        'office_location' => 'Science Building, Room 302',
                        'department_id' => 1,
                    ],
                    (object) [
                        'id' => 2,
                        'name' => 'Dr. Jane Doe',
                        'slug' => 'dr-jane-doe',
                        'type' => 'faculty',
                        'position' => 'Associate Professor',
                        'email' => 'jane.doe@example.com',
                        'office_location' => 'Science Building, Room 303',
                        'department_id' => 1,
                    ],
                ]),
            ],
            (object) [
                'id' => 2,
                'name' => 'Business Administration',
                'slug' => 'business-administration',
                'description' => 'Department of Business Administration',
                'office_location' => 'Business Building, Room 201',
                'facultyAndStaff' => collect([
                    (object) [
                        'id' => 3,
                        'name' => 'Dr. Robert Johnson',
                        'slug' => 'dr-robert-johnson',
                        'type' => 'faculty',
                        'position' => 'Professor',
                        'email' => 'robert.johnson@example.com',
                        'office_location' => 'Business Building, Room 202',
                        'department_id' => 2,
                    ],
                ]),
            ],
        ]);
    }

    public function index()
    {
        $departments = $this->getStaticData();
        return view('faculty-staff.index', compact('departments'));
    }

    public function showDepartment(string $slug)
    {
        $allDepartments = $this->getStaticData();
        $department = $allDepartments->firstWhere('slug', $slug);

        if (!$department) {
            abort(404, 'Department not found');
        }

        return view('faculty-staff.department', compact('department'));
    }

    public function showPerson(string $slug)
    {
        $allDepartments = $this->getStaticData();
        $person = null;
        $department = null;

        foreach ($allDepartments as $dept) {
            $found = $dept->facultyAndStaff->firstWhere('slug', $slug);
            if ($found) {
                $person = $found;
                $department = $dept;
                break;
            }
        }

        if (!$person) {
            abort(404, 'Person not found');
        }

        return view('faculty-staff.show', compact('person', 'department'));
    }
}


