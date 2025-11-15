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
