<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Computer Science', 'slug' => 'computer-science', 'email' => 'cs@example.edu', 'phone' => '123-456-0001', 'office_location' => 'Building A, Room 101', 'office_hours' => 'Mon-Fri 9:00-17:00'],
            ['name' => 'Mathematics', 'slug' => 'mathematics', 'email' => 'math@example.edu', 'phone' => '123-456-0002', 'office_location' => 'Building B, Room 202', 'office_hours' => 'Mon-Fri 9:00-17:00'],
            ['name' => 'Human Resources', 'slug' => 'human-resources', 'email' => 'hr@example.edu', 'phone' => '123-456-0003', 'office_location' => 'Admin, Room 12', 'office_hours' => 'Mon-Fri 8:00-16:00'],
        ];

        foreach ($departments as $data) {
            Department::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}


