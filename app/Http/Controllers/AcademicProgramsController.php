<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademicProgramsController extends Controller
{
    /**
     * Get static academic programs data
     */
    private function getStaticData()
    {
        return collect([
            (object) [
                'id' => 1,
                'title' => 'Bachelor of Science in Computer Science',
                'description' => 'A comprehensive program covering software development, algorithms, and computer systems.',
                'overview' => 'Our Computer Science program provides students with a strong foundation in programming, software engineering, and computer systems. Students will learn fundamental concepts in algorithms, data structures, software design, and computer architecture.',
                'course_description' => 'The program covers core topics including programming languages, database systems, web development, mobile applications, artificial intelligence, and cybersecurity. Students will engage in hands-on projects and internships to gain practical experience.',
                'curriculum_outline' => 'Year 1: Introduction to Programming, Data Structures, Discrete Mathematics\nYear 2: Algorithms, Database Systems, Software Engineering\nYear 3: Web Development, Mobile Applications, Operating Systems\nYear 4: Capstone Project, Internship, Advanced Electives',
                'admission_requirements' => 'High school diploma or equivalent\nMinimum GPA of 2.5\nSAT/ACT scores\nLetters of recommendation\nPersonal statement',
                'graduation_requirements' => 'Completion of 120 credit hours\nMinimum GPA of 2.0\nCompletion of capstone project\nInternship or work experience',
                'content' => '<p>Our Computer Science program provides students with a strong foundation in programming, software engineering, and computer systems.</p>',
                'level' => 'undergraduate',
                'slug' => 'bachelor-of-science-computer-science',
                'duration' => '4 years',
                'degree' => 'Bachelor of Science',
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 2,
                'title' => 'Bachelor of Science in Business Administration',
                'description' => 'Develop business skills and leadership capabilities in this comprehensive program.',
                'overview' => 'Our Business Administration program prepares students for leadership roles in various business sectors. The curriculum emphasizes critical thinking, strategic planning, and effective communication skills essential for modern business environments.',
                'course_description' => 'Students will study core business disciplines including accounting, finance, marketing, management, and operations. The program includes case studies, group projects, and real-world business simulations.',
                'curriculum_outline' => 'Year 1: Principles of Business, Economics, Accounting Fundamentals\nYear 2: Marketing, Finance, Management Principles\nYear 3: Strategic Management, Business Law, Operations\nYear 4: Capstone Project, Internship, Specialization Courses',
                'admission_requirements' => 'High school diploma or equivalent\nMinimum GPA of 2.5\nSAT/ACT scores\nLetters of recommendation',
                'graduation_requirements' => 'Completion of 120 credit hours\nMinimum GPA of 2.0\nCompletion of capstone project\nBusiness internship',
                'content' => '<p>Our Business Administration program prepares students for leadership roles in various business sectors.</p>',
                'level' => 'undergraduate',
                'slug' => 'bachelor-of-science-business-administration',
                'duration' => '4 years',
                'degree' => 'Bachelor of Science',
                'is_active' => true,
                'order' => 2,
            ],
            (object) [
                'id' => 3,
                'title' => 'Master of Science in Information Technology',
                'description' => 'Advanced studies in IT management and emerging technologies.',
                'overview' => 'This graduate program focuses on advanced IT concepts and management strategies. Designed for professionals seeking to advance their careers in technology leadership and management roles.',
                'course_description' => 'The program covers advanced topics in IT management, cloud computing, cybersecurity, data analytics, and emerging technologies. Students will work on real-world projects and research initiatives.',
                'curriculum_outline' => 'Year 1: IT Management, Cloud Computing, Cybersecurity\nYear 2: Data Analytics, Emerging Technologies, Thesis Project',
                'admission_requirements' => 'Bachelor\'s degree in related field\nMinimum GPA of 3.0\nGRE scores (optional)\nLetters of recommendation\nStatement of purpose',
                'graduation_requirements' => 'Completion of 36 credit hours\nMinimum GPA of 3.0\nCompletion of thesis or capstone project',
                'content' => '<p>This graduate program focuses on advanced IT concepts and management strategies.</p>',
                'level' => 'graduate',
                'slug' => 'master-of-science-information-technology',
                'duration' => '2 years',
                'degree' => 'Master of Science',
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 4,
                'title' => 'Bachelor of Arts in Education',
                'description' => 'Prepare for a career in teaching with our comprehensive education program.',
                'overview' => 'Our Education program equips students with the knowledge and skills needed for teaching careers. The curriculum combines theoretical foundations with practical teaching experience through student teaching placements.',
                'course_description' => 'Students will study educational psychology, curriculum development, instructional methods, and classroom management. The program includes extensive field experience in local schools.',
                'curriculum_outline' => 'Year 1: Introduction to Education, Child Development, Educational Psychology\nYear 2: Curriculum Design, Instructional Methods, Assessment\nYear 3: Special Education, Classroom Management, Technology in Education\nYear 4: Student Teaching, Capstone Project, Professional Development',
                'admission_requirements' => 'High school diploma or equivalent\nMinimum GPA of 2.5\nSAT/ACT scores\nBackground check\nLetters of recommendation',
                'graduation_requirements' => 'Completion of 120 credit hours\nMinimum GPA of 2.5\nCompletion of student teaching\nPassing scores on certification exams',
                'content' => '<p>Our Education program equips students with the knowledge and skills needed for teaching careers.</p>',
                'level' => 'undergraduate',
                'slug' => 'bachelor-of-arts-education',
                'duration' => '4 years',
                'degree' => 'Bachelor of Arts',
                'is_active' => true,
                'order' => 3,
            ],
        ]);
    }

    /**
     * Display a listing of all academic programs
     */
    public function index()
    {
        $programs = $this->getStaticData()->groupBy('level');
        return view('academic-programs.index', compact('programs'));
    }

    /**
     * Display the specified academic program
     */
    public function show($slug)
    {
        $allPrograms = $this->getStaticData();
        $program = $allPrograms->firstWhere('slug', $slug);

        if (!$program) {
            abort(404, 'Program not found');
        }

        // Get other programs from the same level
        $relatedPrograms = $allPrograms
            ->where('level', $program->level)
            ->where('id', '!=', $program->id)
            ->values();

        return view('academic-programs.show', compact('program', 'relatedPrograms'));
    }
}
