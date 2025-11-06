<?php

namespace Database\Seeders;

use App\Models\AcademicProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Preschool Education',
                'level' => 'Preschool',
                'duration' => '2 years',
                'order' => 1,
                'overview' => 'Our Preschool program provides a nurturing and stimulating environment for children aged 3-5 years old. We focus on holistic development through play-based learning, ensuring each child develops social, emotional, cognitive, and physical skills in a safe and supportive setting.',
                'course_description' => 'The Preschool curriculum is designed to spark curiosity and foster a love of learning. Our program includes:\n\n• Early literacy and numeracy skills\n• Creative arts and music\n• Physical education and outdoor play\n• Social skills development\n• Sensory exploration activities\n• Introduction to science and nature',
                'curriculum_outline' => '1. Language Development\n   - Alphabet recognition and phonics\n   - Storytelling and reading readiness\n   - Oral communication skills\n\n2. Mathematics Readiness\n   - Number recognition and counting\n   - Basic shapes and patterns\n   - Sorting and classification\n\n3. Creative Arts\n   - Drawing, painting, and crafts\n   - Music and movement\n   - Dramatic play\n\n4. Physical Development\n   - Gross motor skills\n   - Fine motor skills\n   - Health and wellness\n\n5. Social and Emotional Learning\n   - Sharing and cooperation\n   - Emotion recognition and management\n   - Building friendships',
                'admission_requirements' => '• Child must be 3-5 years old\n• Birth certificate\n• Medical clearance\n• Completed enrollment form\n• Parent/guardian interview',
                'graduation_requirements' => '• Completion of preschool curriculum\n• Attendance rate of at least 85%\n• Developmental assessment passed\n• Ready for Kindergarten placement',
            ],
            [
                'title' => 'Elementary Education',
                'level' => 'Elementary',
                'duration' => '6 years',
                'order' => 2,
                'overview' => 'The Elementary program builds upon preschool foundations while introducing structured academic learning. We provide comprehensive education that balances academics with character development, preparing students for higher levels of education.',
                'course_description' => 'Our Elementary curriculum covers all core subjects while maintaining a balanced approach to learning:\n\n• Mathematics and problem-solving\n• Reading and language arts\n• Science and technology\n• Social studies and history\n• Physical education and health\n• Art, music, and cultural awareness',
                'curriculum_outline' => 'Grades 1-3 (Primary Level):\n• Reading, Writing, and Phonics\n• Basic Mathematics\n• Science and Nature Studies\n• Social Studies\n• Physical Education\n• Character Education\n\nGrades 4-6 (Intermediate Level):\n• Advanced Reading and Literature\n• Mathematics and Geometry\n• General Science\n• Social Studies and History\n• Computer Literacy\n• Music, Arts, and PE',
                'admission_requirements' => '• Completion of preschool or entrance exam\n• Report card from previous school\n• Birth certificate\n• Medical clearance\n• Interview with school counselor',
                'graduation_requirements' => '• Completion of all required subjects\n• Passing grade of 75% or higher\n• Portfolio completion\n• Character assessment passed\n• Final comprehensive exam passed',
            ],
            [
                'title' => 'Junior High School',
                'level' => 'Junior High',
                'duration' => '4 years',
                'order' => 3,
                'overview' => 'Junior High School program focuses on academic excellence and character formation. We prepare students for senior high school while fostering critical thinking, problem-solving skills, and values-based education.',
                'course_description' => 'The Junior High curriculum is designed to challenge students academically while supporting their personal growth:\n\n• Advanced Mathematics\n• Language Arts and Literature\n• Science and Laboratory Work\n• Social Studies and History\n• Technology and Computer Science\n• Physical Education and Sports',
                'curriculum_outline' => 'Grade 7:\n• Pre-Algebra\n• English and Communication\n• Integrated Science\n• Philippine History\n• Values Education\n• TLE and ICT\n\nGrade 8:\n• Algebra 1\n• World Literature\n• Biology and Chemistry\n• World History\n• MAPEH (Music, Arts, PE, Health)\n• Entrepreneurship\n\nGrade 9:\n• Geometry\n• Filipino and Panitikan\n• Physics and Environmental Science\n• Asian History\n• Technology and Livelihood\n• Elective courses\n\nGrade 10:\n• Advanced Math\n• Research and Statistics\n• Advanced Sciences\n• Contemporary Issues\n• Career Guidance\n• Culminating Activities',
                'admission_requirements' => '• Completed Elementary education\n• Elementary report card\n• Passing entrance examination\n• Interview with guidance counselor\n• Medical and dental clearance\n• Character references',
                'graduation_requirements' => '• Completion of all required subjects\n• Average grade of 85% or higher\n• Research project completed\n• Community service hours completed\n• Passing exit examination\n• Good moral character',
            ],
            [
                'title' => 'Senior High School - STEM Strand',
                'level' => 'Senior High',
                'duration' => '2 years',
                'order' => 4,
                'overview' => 'The STEM (Science, Technology, Engineering, and Mathematics) strand prepares students for college programs in engineering, architecture, medicine, and related fields. We provide rigorous academic training with hands-on laboratory experiences and research opportunities.',
                'course_description' => 'Our STEM strand curriculum emphasizes critical thinking, analytical skills, and scientific investigation:\n\n• Advanced Mathematics (Calculus, Statistics)\n• Physics with Laboratory\n• Chemistry and Biochemistry\n• Biology and Research Methods\n• Computer Programming\n• Engineering Principles',
                'curriculum_outline' => 'Grade 11:\n• Pre-Calculus\n• General Chemistry\n• General Biology\n• General Physics\n• Basic Calculus\n• Computer Programming\n\nGrade 12:\n• Basic Calculus\n• Statistics and Probability\n• Organic Chemistry\n• Advanced Biology\n• Advanced Physics\n• Capstone Research Project',
                'admission_requirements' => '• Completion of Junior High School\n• Passing grade in Mathematics and Science\n• Entrance examination passed\n• Interview with STEM coordinator\n• Medical clearance\n• Interest in STEM fields',
                'graduation_requirements' => '• Completion of all strand-specific subjects\n• Research project defense passed\n• Minimum grade of 85% in core subjects\n• On-the-job training completed\n• Exit examination passed',
            ],
            [
                'title' => 'Senior High School - ABM Strand',
                'level' => 'Senior High',
                'duration' => '2 years',
                'order' => 5,
                'overview' => 'The ABM (Accountancy, Business, and Management) strand is designed for students interested in pursuing careers in business, accountancy, and management. We provide comprehensive business education with practical application through internships and business simulations.',
                'course_description' => 'Our ABM strand develops business acumen and entrepreneurial skills:\n\n• Business Mathematics\n• Business Ethics and Social Responsibility\n• Principles of Marketing\n• Applied Economics\n• Business Finance\n• Organization and Management\n• Entrepreneurship',
                'curriculum_outline' => 'Grade 11:\n• Fundamentals of ABM 1\n• Business Mathematics\n• Introduction to Philosophy\n• Organization and Management\n• Basic Calculus\n\nGrade 12:\n• Business Finance\n• Business Ethics\n• Applied Economics\n• Principles of Marketing\n• Business Enterprise Simulation',
                'admission_requirements' => '• Completion of Junior High School\n• Passing grade in Mathematics\n• Entrance examination passed\n• Interview with ABM coordinator\n• Interest in business and management\n• Good analytical skills',
                'graduation_requirements' => '• Completion of all strand-specific subjects\n• Business plan presentation passed\n• Minimum grade of 85% in core subjects\n• On-the-job training in business establishment\n• Exit examination passed',
            ],
            [
                'title' => 'Bachelor of Science in Information Technology',
                'level' => 'College',
                'duration' => '4 years',
                'order' => 6,
                'overview' => 'The BS Information Technology program provides comprehensive education in computing and information systems. Students learn programming, database management, network administration, and software development to prepare for careers in the rapidly growing IT industry.',
                'course_description' => 'Our IT program combines theoretical knowledge with practical skills:\n\n• Programming Languages and Software Development\n• Database Systems and Management\n• Network Administration and Security\n• Web Development and Design\n• System Analysis and Design\n• IT Project Management\n• Emerging Technologies',
                'curriculum_outline' => 'First Year:\n• Introduction to Computing\n• Programming Fundamentals\n• Data Structures and Algorithms\n• Web Development 1\n• Mathematics for IT\n\nSecond Year:\n• Object-Oriented Programming\n• Database Systems\n• Systems Analysis and Design\n• Network Administration\n• Web Development 2\n\nThird Year:\n• Software Engineering\n• Information Security\n• Cloud Computing\n• Mobile Development\n• IT Electives\n\nFourth Year:\n• IT Capstone Project\n• On-the-Job Training (OJT)\n• Ethics and Professional Practice\n• Thesis Defense',
                'admission_requirements' => '• Completion of Senior High School (STEM, ICT, or related strand)\n• Passing grade in Mathematics and Science\n• Entrance examination passed\n• Interview with department head\n• Medical clearance\n• Character references',
                'graduation_requirements' => '• Completion of all required courses (146 units minimum)\n• GPA of 2.0 or higher\n• Capstone project defense passed\n• On-the-job training (200 hours minimum)\n• Thesis completion and defense\n• No failing grade in any major subject\n• Comprehensive examination passed',
            ],
        ];

        foreach ($programs as $program) {
            AcademicProgram::create($program);
        }
    }
}
