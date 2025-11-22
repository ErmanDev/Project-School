<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\StudentServicesController;
use App\Http\Controllers\FacultyStaffController;

class HomeController extends Controller
{
    /**
     * Display the homepage.
     */
    public function index()
    {
        // Mock data for published announcements
        $announcements = collect([
            (object) [
                'id' => 1,
                'title' => 'New Academic Calendar for 2024-2025 Now Available',
                'description' => 'We are pleased to announce the release of the academic calendar for the upcoming academic year. All students and faculty members are encouraged to review important dates and deadlines.',
                'content' => '<p>The new academic calendar for the 2024-2025 academic year has been published and is now available for download.</p>',
                'category' => 'announcement',
                'slug' => 'new-academic-calendar-2024-2025',
                'featured_image' => null,
                'event_date' => now()->addDays(7),
                'start_time' => '09:00',
                'end_time' => null,
                'location' => 'Main Campus',
                'venue' => 'Administration Building',
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => true,
                'published_at' => now()->subDays(2),
            ],
            (object) [
                'id' => 2,
                'title' => 'Registration for Spring 2025 Semester Opens Next Week',
                'description' => 'Online registration for the Spring 2025 semester will begin on Monday. Make sure you have all necessary documents ready.',
                'content' => '<p>We are excited to announce that online registration for the Spring 2025 semester will open on Monday, November 11, 2024 at 8:00 AM.</p>',
                'category' => 'announcement',
                'slug' => 'spring-2025-registration',
                'featured_image' => null,
                'event_date' => now()->addDays(10),
                'start_time' => '08:00',
                'end_time' => '17:00',
                'location' => 'Online',
                'venue' => null,
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => true,
                'published_at' => now()->subDays(1),
            ],
            (object) [
                'id' => 3,
                'title' => 'Important Notice: Library Extended Hours During Finals',
                'description' => 'The campus library will extend its operating hours during the final examination period to better serve our students.',
                'content' => '<p>To support students during the upcoming final examination period, the campus library will extend its operating hours.</p>',
                'category' => 'announcement',
                'slug' => 'library-extended-hours',
                'featured_image' => null,
                'event_date' => now()->addDays(20),
                'start_time' => '07:00',
                'end_time' => '23:00',
                'location' => 'Main Campus',
                'venue' => 'University Library',
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => false,
                'published_at' => now()->subHours(12),
            ],
            (object) [
                'id' => 4,
                'title' => 'Campus Health and Safety Protocol Updates',
                'description' => 'Important updates regarding campus health and safety protocols. All students and staff must review the new guidelines.',
                'content' => '<p>We are updating our campus health and safety protocols effective immediately.</p>',
                'category' => 'announcement',
                'slug' => 'health-safety-protocol-updates',
                'featured_image' => null,
                'event_date' => null,
                'start_time' => null,
                'end_time' => null,
                'location' => null,
                'venue' => null,
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => false,
                'published_at' => now()->subDays(3),
            ],
            (object) [
                'id' => 5,
                'title' => 'Scholarship Application Deadline Approaching',
                'description' => 'Reminder that scholarship applications for the next academic year are due soon. Don\'t miss this opportunity!',
                'content' => '<p>This is a friendly reminder that the deadline for scholarship applications for the 2025-2026 academic year is December 15, 2024.</p>',
                'category' => 'announcement',
                'slug' => 'scholarship-application-deadline',
                'featured_image' => null,
                'event_date' => now()->addDays(30),
                'start_time' => '17:00',
                'end_time' => null,
                'location' => 'Online',
                'venue' => null,
                'requires_registration' => true,
                'registration_url' => 'https://example.com/scholarship-application',
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            (object) [
                'id' => 6,
                'title' => 'Campus Wi-Fi Network Maintenance Scheduled',
                'description' => 'Planned maintenance for the campus Wi-Fi network will occur this weekend. Some services may be temporarily unavailable.',
                'content' => '<p>We will be performing scheduled maintenance on the campus Wi-Fi network this Saturday, November 9, 2024 from 2:00 AM to 6:00 AM.</p>',
                'category' => 'announcement',
                'slug' => 'wifi-maintenance',
                'featured_image' => null,
                'event_date' => now()->addDays(5),
                'start_time' => '02:00',
                'end_time' => '06:00',
                'location' => 'All Campus Locations',
                'venue' => null,
                'requires_registration' => false,
                'registration_url' => null,
                'is_featured' => false,
                'published_at' => now()->subDays(4),
            ],
        ]);

        // Get featured announcements for carousel (from the announcements collection)
        // Filter to get only featured announcements and take up to 5
        $carouselItems = $announcements->filter(function($item) {
            return $item->is_featured === true;
        })->values()->take(5);

        // Mock data for upcoming events
        $upcomingEvents = collect([
            (object) [
                'id' => 1,
                'title' => 'Annual Science Fair',
                'description' => 'Join us for our annual science fair showcasing student innovations.',
                'content' => 'The annual science fair will feature projects from students across all departments...',
                'category' => 'event',
                'slug' => 'annual-science-fair-2024',
                'event_date' => now()->addDays(15),
                'start_time' => '09:00',
                'end_time' => '17:00',
                'location' => 'Main Campus',
                'venue' => 'Science Building',
                'requires_registration' => false,
                'registration_url' => null,
                'published_at' => now()->subDays(10),
            ],
            (object) [
                'id' => 2,
                'title' => 'Career Development Workshop',
                'description' => 'A workshop to help students prepare for their future careers.',
                'content' => 'Learn essential skills for job searching, resume writing, and interview preparation...',
                'category' => 'event',
                'slug' => 'career-development-workshop',
                'event_date' => now()->addDays(20),
                'start_time' => '14:00',
                'end_time' => '16:00',
                'location' => 'Main Campus',
                'venue' => 'Career Center',
                'requires_registration' => false,
                'registration_url' => null,
                'published_at' => now()->subDays(7),
            ],
            (object) [
                'id' => 3,
                'title' => 'Cultural Festival',
                'description' => 'Celebrate diversity with our annual cultural festival.',
                'content' => 'Experience food, music, and performances from various cultures...',
                'category' => 'event',
                'slug' => 'cultural-festival-2024',
                'event_date' => now()->addDays(25),
                'start_time' => '10:00',
                'end_time' => '20:00',
                'location' => 'Main Campus',
                'venue' => 'Student Center',
                'requires_registration' => true,
                'registration_url' => 'https://example.com/cultural-festival-registration',
                'published_at' => now()->subDays(3),
            ],
        ]);

        // Get student service categories for navigation dropdown
        $studentServiceCategories = [
            (object) [
                'title' => 'Guidance and Counseling',
                'category' => 'guidance',
                'url' => route('student-services.index', ['category' => 'guidance']),
            ],
            (object) [
                'title' => 'Library Resources & Digital Services',
                'category' => 'library',
                'url' => route('student-services.index', ['category' => 'library']),
            ],
            (object) [
                'title' => 'Student Organizations & Activities',
                'category' => 'organizations',
                'url' => route('student-services.index', ['category' => 'organizations']),
            ],
        ];

        // Get departments for Faculty & Staff navigation dropdown
        $departments = FacultyStaffController::getDepartments();

        return view('home', compact('carouselItems', 'upcomingEvents', 'announcements', 'studentServiceCategories', 'departments'));
    }
}
