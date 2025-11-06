<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\FacultyStaff;
use Illuminate\Database\Seeder;

class FacultyStaffSeeder extends Seeder
{
    public function run(): void
    {
        $cs = Department::firstOrCreate(['slug' => 'computer-science'], ['name' => 'Computer Science']);
        $math = Department::firstOrCreate(['slug' => 'mathematics'], ['name' => 'Mathematics']);
        $hr = Department::firstOrCreate(['slug' => 'human-resources'], ['name' => 'Human Resources']);

        $people = [
            ['department_id' => $cs->id, 'type' => 'academic', 'name' => 'Dr. Ada Lovelace', 'slug' => 'ada-lovelace', 'title' => 'Professor', 'email' => 'ada@example.edu', 'phone' => '123-456-1001', 'office_location' => 'A-110', 'office_hours' => 'Tue/Thu 10:00-12:00'],
            ['department_id' => $cs->id, 'type' => 'academic', 'name' => 'Alan Turing', 'slug' => 'alan-turing', 'title' => 'Associate Professor', 'email' => 'alan@example.edu', 'phone' => '123-456-1002', 'office_location' => 'A-111', 'office_hours' => 'Mon 14:00-16:00'],
            ['department_id' => $math->id, 'type' => 'academic', 'name' => 'Emmy Noether', 'slug' => 'emmy-noether', 'title' => 'Professor', 'email' => 'emmy@example.edu', 'phone' => '123-456-2001', 'office_location' => 'B-210', 'office_hours' => 'Wed 09:00-11:00'],
            ['department_id' => $hr->id, 'type' => 'non-academic', 'name' => 'Grace Hopper', 'slug' => 'grace-hopper', 'title' => 'HR Manager', 'email' => 'grace@example.edu', 'phone' => '123-456-3001', 'office_location' => 'Admin-12', 'office_hours' => 'Mon-Fri 08:00-16:00'],
        ];

        foreach ($people as $person) {
            FacultyStaff::updateOrCreate(['slug' => $person['slug']], $person);
        }
    }
}


