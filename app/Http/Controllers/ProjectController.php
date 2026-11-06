<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(12);

        return view('pages.projects.index', compact('projects'));
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        $related = Project::where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();

        return view('pages.projects.show', compact('project', 'related'));
    }
}
