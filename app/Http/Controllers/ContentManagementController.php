<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentManagementController extends Controller
{
    /**
     * Display the content management page
     */
    public function index()
    {
        return view('content-management.index');
    }
}

