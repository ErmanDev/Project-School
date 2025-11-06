<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsAndEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            // News
            [
                'title' => 'San Isidro College Launches New STEM Research Center',
                'slug' => 'san-isidro-college-launches-new-stem-research-center',
                'description' => 'State-of-the-art research facility opens to advance scientific innovation and collaboration.',
                'category' => 'news',
                'event_date' => null,
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => true,
                'published_at' => now()->subDays(2),
                'is_active' => true,
                'content' => 'San Isidro College proudly announces the opening of its new STEM Research Center, marking a significant milestone in our commitment to academic excellence and innovation.

This state-of-the-art facility features:

- Advanced laboratories for chemistry, biology, physics, and engineering research
- Collaborative spaces for interdisciplinary projects
- High-tech equipment and modern technology infrastructure
- Sustainability-focused research initiatives
- Industry partnerships for real-world applications

The center will serve as a hub for groundbreaking research, student innovation projects, and faculty-led investigations into critical scientific challenges.

"We are excited to provide our students and faculty with these world-class facilities," said Dr. John Peterson, President of San Isidro College. "This investment in research infrastructure will enable us to push the boundaries of knowledge and prepare our students for careers at the forefront of scientific discovery."

The center is open to all students and faculty, with research proposals being accepted on a rolling basis.',
            ],
            [
                'title' => 'Annual Science Fair Showcases Student Innovation',
                'slug' => 'annual-science-fair-showcases-student-innovation',
                'description' => 'Over 200 students present innovative projects highlighting creative problem-solving and scientific inquiry.',
                'category' => 'news',
                'event_date' => null,
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => true,
                'published_at' => now()->subDays(5),
                'is_active' => true,
                'content' => 'The annual Science Fair brought together over 200 students from various departments, showcasing innovative projects that demonstrated creative problem-solving and scientific inquiry.

Key highlights:

- Environmental sustainability projects addressing climate change
- Technology solutions for everyday challenges
- Medical and health-related research
- Engineering innovations and prototypes
- Community outreach initiatives

Top projects were recognized in categories including:
- Best Overall Project
- Most Innovative Design
- Environmental Impact Award
- Community Service Award

The fair attracted judges from local industries and universities, providing students with valuable feedback and networking opportunities.',
            ],
            [
                'title' => 'New Online Learning Platform Enhances Education Accessibility',
                'slug' => 'new-online-learning-platform-enhances-education-accessibility',
                'description' => 'Digital transformation initiative provides students with flexible learning options and resources.',
                'category' => 'news',
                'event_date' => null,
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => false,
                'published_at' => now()->subDays(8),
                'is_active' => true,
                'content' => 'San Isidro College introduces a comprehensive online learning platform designed to enhance education accessibility and flexibility for all students.

Features include:

- Interactive virtual classrooms
- 24/7 access to course materials and resources
- Real-time collaboration tools
- Assessment and grading system
- Mobile app for learning on the go

This initiative reflects our commitment to providing quality education that adapts to the needs of modern learners.',
            ],
            [
                'title' => 'Students Win National Robotics Championship',
                'slug' => 'students-win-national-robotics-championship',
                'description' => 'San Isidro College robotics team secures first place in National Robotics Competition.',
                'category' => 'news',
                'event_date' => null,
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => false,
                'published_at' => now()->subDays(10),
                'is_active' => true,
                'content' => 'Congratulations to our robotics team for winning the National Robotics Championship! This achievement demonstrates our commitment to excellence in STEM education.',
            ],

            // Events
            [
                'title' => 'Annual Founder\'s Day Celebration',
                'slug' => 'annual-founders-day-celebration',
                'description' => 'Join us for a day of festivities, awards, and community spirit.',
                'category' => 'event',
                'event_date' => now()->addDays(30)->format('Y-m-d H:i:s'),
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => true,
                'published_at' => now()->subDays(1),
                'is_active' => true,
                'content' => 'Join us for our annual Founder\'s Day celebration!

Schedule of Events:
- 8:00 AM: Opening Ceremony with Flag Raising
- 10:00 AM: Alumni Recognition Awards
- 12:00 PM: Community Luncheon
- 2:00 PM: Campus Tours
- 4:00 PM: Closing Ceremony and Concert

All students, alumni, faculty, and staff are welcome to attend.',
            ],
            [
                'title' => 'Career Fair 2024',
                'slug' => 'career-fair-2024',
                'description' => 'Connect with top employers and explore career opportunities.',
                'category' => 'event',
                'event_date' => now()->addDays(45)->format('Y-m-d H:i:s'),
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => false,
                'published_at' => now()->subDays(3),
                'is_active' => true,
                'content' => 'The annual Career Fair brings together students and top employers from various industries.

Participating companies include technology firms, healthcare institutions, engineering companies, and educational organizations.

Prepare for the event:
- Update your resume
- Research participating companies
- Dress professionally
- Prepare questions for employers',
            ],
            [
                'title' => 'Cultural Festival: Celebrating Diversity',
                'slug' => 'cultural-festival-celebrating-diversity',
                'description' => 'Experience the richness of cultures through food, music, and traditions.',
                'category' => 'event',
                'event_date' => now()->addDays(60)->format('Y-m-d H:i:s'),
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => false,
                'published_at' => now()->subDays(7),
                'is_active' => true,
                'content' => 'Join us for our annual Cultural Festival! Experience the diversity of our community through food, music, dance, and traditions from around the world.',
            ],

            // Announcements
            [
                'title' => 'Spring Semester Registration Now Open',
                'slug' => 'spring-semester-registration-now-open',
                'description' => 'Register for spring semester courses starting November 15.',
                'category' => 'announcement',
                'event_date' => null,
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => false,
                'published_at' => now()->subDays(1),
                'is_active' => true,
                'content' => 'Spring semester registration is now open for all programs. Priority registration for continuing students begins November 15.',
            ],
            [
                'title' => 'Holiday Schedule: Campus Will Be Closed',
                'slug' => 'holiday-schedule-campus-will-be-closed',
                'description' => 'Important holiday closure dates and schedule adjustments.',
                'category' => 'announcement',
                'event_date' => null,
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => false,
                'published_at' => now()->subDays(2),
                'is_active' => true,
                'content' => 'The campus will be closed during the holidays from December 24 to January 2. Regular operations resume on January 3.',
            ],
            [
                'title' => 'Library Extended Hours for Finals',
                'slug' => 'library-extended-hours-for-finals',
                'description' => 'Additional study spaces and extended hours available.',
                'category' => 'announcement',
                'event_date' => null,
                'featured_image' => null,
                'gallery_images' => null,
                'youtube_url' => null,
                'is_featured' => false,
                'published_at' => now()->subDays(3),
                'is_active' => true,
                'content' => 'The library will be open 24 hours during finals week to support student success. Study rooms and quiet spaces are available on a first-come, first-served basis.',
            ],
        ];

        foreach ($items as $item) {
            \App\Models\NewsAndEvent::create($item);
        }
    }
}
