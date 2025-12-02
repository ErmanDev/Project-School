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
                'id' => 2,
                'title' => 'Student Handbook',
                'description' => 'Complete guide to college policies and procedures.',
                'category' => 'Other Essential Documents',
                'slug' => 'student-handbook',
                'file_name' => 'student-handbook.pdf',
                'file_path' => 'downloads/student-handbook.pdf',
                'file_type' => 'pdf',
                'formatted_file_size' => '5.2 MB',
                'download_count' => 0,
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 3,
                'title' => 'Academic Calendar',
                'description' => 'Important dates and deadlines for the academic year.',
                'category' => 'Other Essential Documents',
                'slug' => 'academic-calendar',
                'file_name' => 'academic-calendar.pdf',
                'file_path' => 'downloads/academic-calendar.pdf',
                'file_type' => 'pdf',
                'formatted_file_size' => '423 KB',
                'download_count' => 0,
                'is_active' => true,
                'order' => 2,
            ],
            (object) [
                'id' => 4,
                'title' => 'Code of Conduct',
                'description' => 'Student code of conduct and disciplinary policies.',
                'category' => 'Other Essential Documents',
                'slug' => 'code-of-conduct',
                'file_name' => 'code-of-conduct.pdf',
                'file_path' => 'downloads/code-of-conduct.pdf',
                'file_type' => 'pdf',
                'formatted_file_size' => '356 KB',
                'download_count' => 0,
                'is_active' => true,
                'order' => 3,
            ],
            (object) [
                'id' => 5,
                'title' => 'Course Catalog',
                'description' => 'Complete listing of all available courses and programs.',
                'category' => 'Catalogs',
                'slug' => 'course-catalog',
                'file_name' => 'course-catalog.pdf',
                'file_path' => 'downloads/course-catalog.pdf',
                'file_type' => 'pdf',
                'formatted_file_size' => '3.8 MB',
                'download_count' => 0,
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
