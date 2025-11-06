<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            // Guidance and Counseling
            [
                'title' => 'Academic Counseling',
                'slug' => 'academic-counseling',
                'description' => 'One-on-one guidance for academic planning, course selection, and educational goal setting.',
                'category' => 'guidance',
                'contact_info' => 'Email: academic.counseling@sanisidrocollege.edu
Phone: (555) 123-4567
Office: Room 201, Guidance Building',
                'hours' => 'Monday - Friday: 8:00 AM - 5:00 PM
Saturday: 9:00 AM - 12:00 PM
Walk-ins welcome, appointments preferred',
                'location' => 'Guidance Building, Room 201',
                'website_url' => null,
                'is_active' => true,
                'content' => 'Our academic counseling services help students navigate their educational journey with confidence.

Services Offered:
- Academic planning and goal setting
- Course selection and scheduling assistance
- Study skills and time management workshops
- Academic probation support and intervention
- Major selection and career exploration
- Transfer planning for prospective transfer students

Our team of experienced counselors work closely with students to develop personalized academic plans that align with their career goals and interests.

Walk-in hours are available for quick questions, and appointments can be scheduled for more comprehensive academic planning sessions.',
            ],
            [
                'title' => 'Career Development Center',
                'slug' => 'career-development-center',
                'description' => 'Resources and counseling for career exploration, job search, and professional development.',
                'category' => 'guidance',
                'contact_info' => 'Email: career.services@sanisidrocollege.edu
Phone: (555) 123-4568
Office: Room 305, Student Services Building',
                'hours' => 'Monday - Friday: 9:00 AM - 4:00 PM
By appointment only',
                'location' => 'Student Services Building, Room 305',
                'website_url' => null,
                'is_active' => true,
                'content' => 'The Career Development Center provides comprehensive career services to help students transition from college to career.

Services Include:
- Career counseling and assessment
- Resume and cover letter assistance
- Interview preparation workshops
- Job search strategies and resources
- Internship and job placement assistance
- Mock interviews and career coaching
- Networking events and career fairs

Our career counselors work one-on-one with students to identify career interests, develop professional skills, and create effective job search strategies.',
            ],
            [
                'title' => 'Personal Counseling Services',
                'slug' => 'personal-counseling-services',
                'description' => 'Confidential counseling and mental health support for students.',
                'category' => 'guidance',
                'contact_info' => 'Email: counseling@sanisidrocollege.edu
Phone: (555) 123-4569
24/7 Crisis Line: (555) 999-HELP',
                'hours' => 'Monday - Friday: 9:00 AM - 5:00 PM
Emergency support available 24/7',
                'location' => 'Health & Wellness Center, Room 102',
                'website_url' => null,
                'is_active' => true,
                'content' => 'We provide confidential counseling services to support student mental health and well-being.

Areas of Support:
- Personal and emotional concerns
- Stress and anxiety management
- Depression and mood disorders
- Relationship issues
- Crisis intervention
- Substance abuse support
- Trauma recovery
- Grief and loss support

All counseling services are confidential and provided by licensed mental health professionals.',
            ],

            // Library Resources
            [
                'title' => 'Main Library',
                'slug' => 'main-library',
                'description' => 'Comprehensive collection of books, journals, and study resources.',
                'category' => 'library',
                'contact_info' => 'Email: library@sanisidrocollege.edu
Phone: (555) 123-4570
Reference Desk: ext. 4571',
                'hours' => 'Monday - Thursday: 7:00 AM - 9:00 PM
Friday: 7:00 AM - 5:00 PM
Saturday: 9:00 AM - 5:00 PM
Sunday: 12:00 PM - 5:00 PM',
                'location' => 'Library Building, Central Campus',
                'website_url' => null,
                'is_active' => true,
                'content' => 'Our main library offers extensive resources to support learning and research.

Features:
- Over 100,000 physical books and resources
- Quiet study areas and group study rooms
- Computer workstations with internet access
- Printing and photocopying services
- Reference librarians available for assistance
- Interlibrary loan services
- Book checkout for students, faculty, and staff',
            ],
            [
                'title' => 'Digital Library and Online Resources',
                'slug' => 'digital-library-online-resources',
                'description' => 'Access to digital databases, e-books, and online research tools.',
                'category' => 'library',
                'contact_info' => 'Email: digital.library@sanisidrocollege.edu
Phone: (555) 123-4572',
                'hours' => 'Available 24/7 online',
                'location' => 'Online Access',
                'website_url' => 'https://library.sanisidrocollege.edu',
                'is_active' => true,
                'content' => 'Access thousands of digital resources from anywhere, anytime.

Digital Resources Available:
- EBSCO Academic Search Complete
- JSTOR digital library
- ProQuest Research Library
- Springer eBooks
- ScienceDirect
- Google Scholar
- Citation management tools (Zotero, Mendeley)

To access: Login with your student credentials at the library website.',
            ],
            [
                'title' => 'Research and Writing Support',
                'slug' => 'research-writing-support',
                'description' => 'Workshops and assistance for academic research and writing.',
                'category' => 'library',
                'contact_info' => 'Email: writing.center@sanisidrocollege.edu
Phone: (555) 123-4573
Office: Library, Room 201',
                'hours' => 'Monday - Friday: 10:00 AM - 6:00 PM
Walk-ins and appointments available',
                'location' => 'Library Building, Room 201',
                'website_url' => null,
                'is_active' => true,
                'content' => 'Get expert help with your research papers and writing assignments.

Services Include:
- Research assistance and database navigation
- Writing tutorials and workshops
- Citation help (APA, MLA, Chicago style)
- Thesis and dissertation support
- Peer tutoring
- Online writing resources
- Drop-in consultations

Our writing tutors help students at every stage of the writing process, from brainstorming to final editing.',
            ],

            // Student Organizations
            [
                'title' => 'Student Government Association',
                'slug' => 'student-government-association',
                'description' => 'Represent student interests and organize campus activities and events.',
                'category' => 'organizations',
                'contact_info' => 'Email: sga@sanisidrocollege.edu
Phone: (555) 123-4574
Office: Student Center, Room 101',
                'hours' => 'Monday - Friday: 9:00 AM - 5:00 PM',
                'location' => 'Student Center, Room 101',
                'website_url' => null,
                'is_active' => true,
                'content' => 'The Student Government Association (SGA) serves as the voice of the student body.

What We Do:
- Represent student interests to administration
- Organize campus events and activities
- Manage student activity funding
- Serve on college committees
- Advocate for student needs and concerns

Join our weekly meetings every Wednesday at 5:00 PM in the Student Center.',
            ],
            [
                'title' => 'Academic Clubs and Honor Societies',
                'slug' => 'academic-clubs-honor-societies',
                'description' => 'Join discipline-specific clubs and honor societies to connect with peers.',
                'category' => 'organizations',
                'contact_info' => 'Email: clubs@sanisidrocollege.edu
Phone: (555) 123-4575',
                'hours' => 'Varies by club',
                'location' => 'Student Activities Office',
                'website_url' => null,
                'is_active' => true,
                'content' => 'Connect with like-minded students in academic clubs and honor societies.

Available Clubs:
- Computer Science Club
- Biology Honors Society
- Engineering Society
- Business Student Association
- Mathematics Club
- Psychology Society
- Chemistry Honor Society
- History Club

Benefits:
- Professional networking opportunities
- Guest speaker events
- Field trips and conferences
- Leadership development
- Scholarship opportunities',
            ],
            [
                'title' => 'Cultural and Special Interest Organizations',
                'slug' => 'cultural-special-interest-organizations',
                'description' => 'Diverse student groups celebrating culture, interests, and community.',
                'category' => 'organizations',
                'contact_info' => 'Email: cultural.clubs@sanisidrocollege.edu
Phone: (555) 123-4576',
                'hours' => 'Varies by organization',
                'location' => 'Diversity & Inclusion Office',
                'website_url' => null,
                'is_active' => true,
                'content' => 'Celebrate diversity and explore your interests through various student organizations.

Organizations Include:
- International Student Association
- LGBTQ+ Alliance
- Environmental Club
- Photography Club
- Debate Team
- Drama Club
- Music Society
- Art Club
- Volunteer Service Club

Start your own organization! Contact the Student Activities Office for information on chartering new clubs.',
            ],
        ];

        foreach ($services as $service) {
            \App\Models\StudentService::create($service);
        }
    }
}
