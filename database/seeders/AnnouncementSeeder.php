<?php

namespace Database\Seeders;

use App\Models\NewsAndEvent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $announcements = [
            [
                'title' => 'New Academic Calendar for 2024-2025 Now Available',
                'description' => 'We are pleased to announce the release of the academic calendar for the upcoming academic year. All students and faculty members are encouraged to review important dates and deadlines.',
                'content' => '<p>The new academic calendar for the 2024-2025 academic year has been published and is now available for download. This calendar includes all important dates including semester start and end dates, examination periods, holidays, and special events.</p><p>Key highlights:</p><ul><li>Fall Semester begins: September 2, 2024</li><li>Winter Break: December 20 - January 5</li><li>Spring Semester begins: January 6, 2025</li><li>Final Examinations: May 12-20, 2025</li></ul><p>Please ensure you mark these important dates in your personal calendars.</p>',
                'category' => 'announcement',
                'event_date' => Carbon::now()->addDays(7),
                'start_time' => '09:00',
                'location' => 'Main Campus',
                'venue' => 'Administration Building',
                'is_featured' => true,
                'is_active' => true,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Registration for Spring 2025 Semester Opens Next Week',
                'description' => 'Online registration for the Spring 2025 semester will begin on Monday. Make sure you have all necessary documents ready.',
                'content' => '<p>We are excited to announce that online registration for the Spring 2025 semester will open on <strong>Monday, November 11, 2024</strong> at 8:00 AM.</p><p>To ensure a smooth registration process, please have the following ready:</p><ul><li>Student ID number</li><li>Academic advisor approval</li><li>Payment method ready</li><li>List of preferred courses</li></ul><p>Priority registration will be given to graduating seniors and students with higher academic standing.</p>',
                'category' => 'announcement',
                'event_date' => Carbon::now()->addDays(10),
                'start_time' => '08:00',
                'end_time' => '17:00',
                'location' => 'Online',
                'is_featured' => true,
                'is_active' => true,
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'Important Notice: Library Extended Hours During Finals',
                'description' => 'The campus library will extend its operating hours during the final examination period to better serve our students.',
                'content' => '<p>To support students during the upcoming final examination period, the campus library will extend its operating hours starting <strong>December 1, 2024</strong>.</p><p><strong>Extended Hours:</strong></p><ul><li>Monday - Thursday: 7:00 AM - 11:00 PM</li><li>Friday: 7:00 AM - 9:00 PM</li><li>Saturday: 8:00 AM - 8:00 PM</li><li>Sunday: 10:00 AM - 10:00 PM</li></ul><p>All study rooms will be available on a first-come, first-served basis. Please remember to bring your student ID for entry.</p>',
                'category' => 'announcement',
                'event_date' => Carbon::now()->addDays(20),
                'start_time' => '07:00',
                'end_time' => '23:00',
                'location' => 'Main Campus',
                'venue' => 'University Library',
                'is_featured' => false,
                'is_active' => true,
                'published_at' => Carbon::now()->subHours(12),
            ],
            [
                'title' => 'Campus Health and Safety Protocol Updates',
                'description' => 'Important updates regarding campus health and safety protocols. All students and staff must review the new guidelines.',
                'content' => '<p>We are updating our campus health and safety protocols effective immediately. All members of the campus community are required to familiarize themselves with these updates.</p><p><strong>Key Updates:</strong></p><ul><li>Updated emergency evacuation procedures</li><li>New first aid station locations</li><li>Revised protocol for reporting incidents</li><li>Updated contact information for campus security</li></ul><p>Safety information packets are available at the Student Services office and online through the campus portal.</p>',
                'category' => 'announcement',
                'is_featured' => false,
                'is_active' => true,
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Scholarship Application Deadline Approaching',
                'description' => 'Reminder that scholarship applications for the next academic year are due soon. Don\'t miss this opportunity!',
                'content' => '<p>This is a friendly reminder that the deadline for scholarship applications for the 2025-2026 academic year is <strong>December 15, 2024</strong> at 5:00 PM.</p><p><strong>Available Scholarships:</strong></p><ul><li>Academic Excellence Scholarship</li><li>Need-Based Financial Aid</li><li>Merit Scholarships</li><li>Department-Specific Awards</li></ul><p>Applications must be submitted online through the student portal. Late applications will not be accepted.</p>',
                'category' => 'announcement',
                'event_date' => Carbon::now()->addDays(30),
                'start_time' => '17:00',
                'location' => 'Online',
                'requires_registration' => true,
                'registration_url' => 'https://example.com/scholarship-application',
                'is_featured' => true,
                'is_active' => true,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Campus Wi-Fi Network Maintenance Scheduled',
                'description' => 'Planned maintenance for the campus Wi-Fi network will occur this weekend. Some services may be temporarily unavailable.',
                'content' => '<p>We will be performing scheduled maintenance on the campus Wi-Fi network this <strong>Saturday, November 9, 2024 from 2:00 AM to 6:00 AM</strong>.</p><p>During this time:</p><ul><li>Wi-Fi services will be unavailable</li><li>Online systems may experience brief interruptions</li><li>Library computers will remain operational</li></ul><p>We apologize for any inconvenience and appreciate your understanding as we work to improve our network infrastructure.</p>',
                'category' => 'announcement',
                'event_date' => Carbon::now()->addDays(5),
                'start_time' => '02:00',
                'end_time' => '06:00',
                'location' => 'All Campus Locations',
                'is_featured' => false,
                'is_active' => true,
                'published_at' => Carbon::now()->subDays(4),
            ],
        ];

        foreach ($announcements as $announcement) {
            $announcement['slug'] = Str::slug($announcement['title']);
            NewsAndEvent::create($announcement);
        }
    }
}
