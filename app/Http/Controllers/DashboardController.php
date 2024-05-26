<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', ['title' => 'Admin Dashboard']);
    }

    public function teacher()
    {
        return view('dashboard.teacher', ['title' => 'Teacher Dashboard']);
    }

    public function student()
    {
        return view('dashboard.student', ['title' => 'Student Dashboard']);
    }

    public function librarian()
    {
        return view('dashboard.librarian', ['title' => 'Librarian Dashboard']);
    }

    public function parent()
    {
        
        return view('dashboard.parent', ['title' => 'Parent Dashboard']);
    }
}
