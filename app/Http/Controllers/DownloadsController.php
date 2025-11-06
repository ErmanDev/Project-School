<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadsController extends Controller
{
    /**
     * Display a listing of all downloads, grouped by category
     */
    public function index()
    {
        $downloads = Download::where('is_active', true)
            ->orderBy('category')
            ->orderBy('order')
            ->get()
            ->groupBy('category');

        return view('downloads.index', compact('downloads'));
    }

    /**
     * Download the specified file
     */
    public function download($slug): BinaryFileResponse
    {
        $download = Download::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // Increment download count
        $download->incrementDownloadCount();

        // Get the file path
        $filePath = storage_path('app/public/' . $download->file_path);
        
        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath, $download->file_name);
    }
}
