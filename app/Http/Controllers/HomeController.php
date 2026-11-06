<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_featured', true)
            ->orWhere('is_featured', false)
            ->latest()
            ->take(6)
            ->get();

        return view('pages.home', compact('projects'));
    }
}
