<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadsController extends Controller
{
    /**
     * Get static downloads data
     */
    private function getStaticData()
    {
        return collect([
            (object) [
                'id' => 1,
                'title' => 'Academic Calendar 2024-2025',
                'description' => 'Official academic calendar for the 2024-2025 academic year.',
                'category' => 'calendars',
                'slug' => 'academic-calendar-2024-2025',
                'file_name' => 'academic-calendar-2024-2025.pdf',
                'file_path' => 'downloads/academic-calendar-2024-2025.pdf',
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 2,
                'title' => 'Student Handbook',
                'description' => 'Complete student handbook with policies and procedures.',
                'category' => 'handbooks',
                'slug' => 'student-handbook',
                'file_name' => 'student-handbook.pdf',
                'file_path' => 'downloads/student-handbook.pdf',
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 3,
                'title' => 'Course Catalog',
                'description' => 'Complete listing of all available courses and programs.',
                'category' => 'catalogs',
                'slug' => 'course-catalog',
                'file_name' => 'course-catalog.pdf',
                'file_path' => 'downloads/course-catalog.pdf',
                'is_active' => true,
                'order' => 1,
            ],
        ]);
    }

    /**
     * Display a listing of all downloads, grouped by category
     */
    public function index()
    {
        $downloads = $this->getStaticData()->groupBy('category');
        return view('downloads.index', compact('downloads'));
    }

    /**
     * Download the specified file
     */
    public function download($slug): BinaryFileResponse
    {
        $allDownloads = $this->getStaticData();
        $download = $allDownloads->firstWhere('slug', $slug);

        if (!$download) {
            abort(404, 'Download not found');
        }

        // Get the file path
        $filePath = storage_path('app/public/' . $download->file_path);
        
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath, $download->file_name);
    }
}
