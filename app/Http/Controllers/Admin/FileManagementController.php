<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileManagementController extends Controller
{
    /**
     * Display a listing of files and folders.
     */
    public function index(Request $request)
    {
        $path = $request->get('path', '');
        $disk = 'public';
        
        // Normalize path
        $path = trim($path, '/');
        
        // Get all files and directories
        $directories = Storage::disk($disk)->directories($path);
        $files = Storage::disk($disk)->files($path);
        
        // Organize directories
        $directoryList = [];
        foreach ($directories as $directory) {
            $directoryList[] = [
                'name' => basename($directory),
                'path' => $directory,
                'type' => 'directory',
            ];
        }
        
        // Organize files
        $fileList = [];
        foreach ($files as $file) {
            $fileList[] = [
                'name' => basename($file),
                'path' => $file,
                'type' => $this->getFileType($file),
                'size' => Storage::disk($disk)->size($file),
                'mime' => Storage::disk($disk)->mimeType($file),
                'last_modified' => Storage::disk($disk)->lastModified($file),
            ];
        }
        
        // Sort: directories first, then files
        usort($directoryList, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
        
        usort($fileList, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
        
        $breadcrumbs = $this->getBreadcrumbs($path);
        
        return view('admin.files.index', compact('directoryList', 'fileList', 'path', 'breadcrumbs'));
    }
    
    /**
     * Preview a file.
     */
    public function preview(Request $request)
    {
        $path = $request->get('path');
        $disk = 'public';
        
        if (!$path || !Storage::disk($disk)->exists($path)) {
            return response()->json(['error' => 'File not found'], 404);
        }
        
        $fileType = $this->getFileType($path);
        $mimeType = Storage::disk($disk)->mimeType($path);
        $url = Storage::disk($disk)->url($path);
        
        return response()->json([
            'path' => $path,
            'name' => basename($path),
            'type' => $fileType,
            'mime' => $mimeType,
            'url' => $url,
            'size' => Storage::disk($disk)->size($path),
        ]);
    }
    
    /**
     * Delete a file or directory.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'path' => 'required|string',
            'type' => 'required|in:file,directory',
        ]);
        
        $path = $request->path;
        $type = $request->type;
        $disk = 'public';
        
        if (!Storage::disk($disk)->exists($path)) {
            return back()->with('error', 'File or directory not found.');
        }
        
        try {
            if ($type === 'directory') {
                Storage::disk($disk)->deleteDirectory($path);
                return back()->with('success', 'Directory deleted successfully.');
            } else {
                Storage::disk($disk)->delete($path);
                return back()->with('success', 'File deleted successfully.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete: ' . $e->getMessage());
        }
    }
    
    /**
     * Upload files.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file|max:10240', // 10MB max
            'path' => 'nullable|string',
        ]);
        
        $path = trim($request->get('path', ''), '/');
        $disk = 'public';
        $uploaded = [];
        
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $filePath = $path ? $path . '/' . $fileName : $fileName;
                
                // Handle duplicate names
                $counter = 1;
                $originalPath = $filePath;
                while (Storage::disk($disk)->exists($filePath)) {
                    $pathInfo = pathinfo($originalPath);
                    $filePath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '_' . $counter . '.' . $pathInfo['extension'];
                    $counter++;
                }
                
                $file->storeAs($path, basename($filePath), $disk);
                $uploaded[] = basename($filePath);
            }
        }
        
        return back()->with('success', count($uploaded) . ' file(s) uploaded successfully.');
    }
    
    /**
     * Create a new directory.
     */
    public function createDirectory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'nullable|string',
        ]);
        
        $path = trim($request->get('path', ''), '/');
        $name = trim($request->name);
        $disk = 'public';
        
        $newPath = $path ? $path . '/' . $name : $name;
        
        if (Storage::disk($disk)->exists($newPath)) {
            return back()->with('error', 'Directory already exists.');
        }
        
        Storage::disk($disk)->makeDirectory($newPath);
        
        return back()->with('success', 'Directory created successfully.');
    }
    
    /**
     * Get file type category.
     */
    private function getFileType($path)
    {
        $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
        
        $imageTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'bmp', 'ico'];
        $documentTypes = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'rtf'];
        $videoTypes = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm'];
        $audioTypes = ['mp3', 'wav', 'ogg', 'aac', 'flac'];
        $archiveTypes = ['zip', 'rar', '7z', 'tar', 'gz'];
        
        if (in_array($extension, $imageTypes)) {
            return 'image';
        } elseif (in_array($extension, $documentTypes)) {
            return 'document';
        } elseif (in_array($extension, $videoTypes)) {
            return 'video';
        } elseif (in_array($extension, $audioTypes)) {
            return 'audio';
        } elseif (in_array($extension, $archiveTypes)) {
            return 'archive';
        } else {
            return 'other';
        }
    }
    
    /**
     * Get breadcrumbs for navigation.
     */
    private function getBreadcrumbs($path)
    {
        $breadcrumbs = [
            ['name' => 'Root', 'path' => ''],
        ];
        
        if ($path) {
            $parts = explode('/', $path);
            $currentPath = '';
            
            foreach ($parts as $part) {
                $currentPath .= ($currentPath ? '/' : '') . $part;
                $breadcrumbs[] = [
                    'name' => $part,
                    'path' => $currentPath,
                ];
            }
        }
        
        return $breadcrumbs;
    }
}

