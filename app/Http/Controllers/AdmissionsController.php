<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionsController extends Controller
{

    /**
     * Display admission requirements page
     */
    public function requirements()
    {
        return view('admissions.requirements');
    }

    /**
     * Display pre-registration page
     */
    public function preRegistration()
    {
        return view('admissions.pre-registration');
    }

    /**
     * Display enrollment form page
     */
    public function enrollmentForm()
    {
        return view('admissions.enrollment-form');
    }
}

