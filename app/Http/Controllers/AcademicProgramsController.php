<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AcademicProgram;
use Illuminate\Http\Request;

class AcademicProgramsController extends Controller
{
    /**
     * Display a listing of all academic programs
     */
    public function index()
    {
        try {
            $programs = AcademicProgram::where('is_active', true)
                ->orderBy('order')
                ->get()
                ->groupBy('level');
        } catch (\Exception $e) {
            // If database is not available, use empty collection
            $programs = collect([]);
        }

        return view('academic-programs.index', compact('programs'));
    }

    /**
     * Display the specified academic program
     */
    public function show($slug)
    {
        try {
            $program = AcademicProgram::where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail();

            // Get other programs from the same level
            $relatedPrograms = AcademicProgram::where('level', $program->level)
                ->where('id', '!=', $program->id)
                ->where('is_active', true)
                ->orderBy('order')
                ->get();
        } catch (\Exception $e) {
            abort(404, 'Program not found');
        }

        return view('academic-programs.show', compact('program', 'relatedPrograms'));
    }
}
