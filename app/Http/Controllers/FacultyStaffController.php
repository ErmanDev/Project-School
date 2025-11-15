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
                'office_hours' => 'Monday - Friday: 9:00 AM - 5:00 PM',
                'email' => 'cs@example.com',
                'phone' => '(555) 123-4001',
                'facultyAndStaff' => collect([
                    (object) [
                        'id' => 1,
                        'name' => 'Dr. John Smith',
                        'slug' => 'dr-john-smith',
                        'type' => 'academic',
                        'position' => 'Professor',
                        'title' => 'Professor',
                        'email' => 'john.smith@example.com',
                        'phone' => '(555) 123-4002',
                        'photo_path' => null,
                        'office_location' => 'Science Building, Room 302',
                        'office_hours' => 'Monday, Wednesday, Friday: 10:00 AM - 12:00 PM\nBy appointment',
                        'department_id' => 1,
                    ],
                    (object) [
                        'id' => 2,
                        'name' => 'Dr. Jane Doe',
                        'slug' => 'dr-jane-doe',
                        'type' => 'academic',
                        'position' => 'Associate Professor',
                        'title' => 'Associate Professor',
                        'email' => 'jane.doe@example.com',
                        'phone' => '(555) 123-4003',
                        'photo_path' => null,
                        'office_location' => 'Science Building, Room 303',
                        'office_hours' => 'Tuesday, Thursday: 2:00 PM - 4:00 PM\nBy appointment',
                        'department_id' => 1,
                    ],
                    (object) [
                        'id' => 4,
                        'name' => 'Ms. Sarah Williams',
                        'slug' => 'ms-sarah-williams',
                        'type' => 'non-academic',
                        'position' => 'Administrative Assistant',
                        'title' => 'Administrative Assistant',
                        'email' => 'sarah.williams@example.com',
                        'phone' => '(555) 123-4004',
                        'photo_path' => null,
                        'office_location' => 'Science Building, Room 301',
                        'office_hours' => 'Monday - Friday: 8:00 AM - 5:00 PM',
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
                'office_hours' => 'Monday - Friday: 8:00 AM - 5:00 PM',
                'email' => 'business@example.com',
                'phone' => '(555) 123-5001',
                'facultyAndStaff' => collect([
                    (object) [
                        'id' => 3,
                        'name' => 'Dr. Robert Johnson',
                        'slug' => 'dr-robert-johnson',
                        'type' => 'academic',
                        'position' => 'Professor',
                        'title' => 'Professor',
                        'email' => 'robert.johnson@example.com',
                        'phone' => '(555) 123-5002',
                        'photo_path' => null,
                        'office_location' => 'Business Building, Room 202',
                        'office_hours' => 'Monday, Wednesday: 1:00 PM - 3:00 PM\nBy appointment',
                        'department_id' => 2,
                    ],
                    (object) [
                        'id' => 5,
                        'name' => 'Mr. Michael Brown',
                        'slug' => 'mr-michael-brown',
                        'type' => 'non-academic',
                        'position' => 'Department Secretary',
                        'title' => 'Department Secretary',
                        'email' => 'michael.brown@example.com',
                        'phone' => '(555) 123-5003',
                        'photo_path' => null,
                        'office_location' => 'Business Building, Room 201',
                        'office_hours' => 'Monday - Friday: 8:00 AM - 5:00 PM',
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
                // Add department reference to person object for the view
                $person->department = $dept;
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


