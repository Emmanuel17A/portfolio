<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(20);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateProject($request);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('projects', 'public');
        }

        $validated['technologies'] = $this->parseTags($validated['technologies'] ?? '');
        $validated['features']     = $this->parseLines($validated['features'] ?? '');
        $validated['is_featured']  = $request->boolean('is_featured');
        $validated['slug']         = Str::slug($validated['name']);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $this->validateProject($request, $project);

        if ($request->hasFile('image')) {
            if ($project->image_path) Storage::disk('public')->delete($project->image_path);
            $validated['image_path'] = $request->file('image')->store('projects', 'public');
        }

        $validated['technologies'] = $this->parseTags($validated['technologies'] ?? '');
        $validated['features']     = $this->parseLines($validated['features'] ?? '');
        $validated['is_featured']  = $request->boolean('is_featured');

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        if ($project->image_path) Storage::disk('public')->delete($project->image_path);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted.');
    }

    private function validateProject(Request $request, ?Project $project = null): array
    {
        return $request->validate([
            'name'        => ['required', 'string', 'max:200'],
            'description' => ['required', 'string'],
            'problem'     => ['nullable', 'string'],
            'solution'    => ['nullable', 'string'],
            'category'    => ['required', 'in:web,mobile,api,enterprise,other'],
            'technologies'=> ['nullable', 'string'],
            'features'    => ['nullable', 'string'],
            'live_url'    => ['nullable', 'url'],
            'github_url'  => ['nullable', 'url'],
            'status'      => ['required', 'in:live,dev,archived'],
            'is_featured' => ['boolean'],
            'sort_order'  => ['integer', 'min:0'],
            'image'       => ['nullable', 'image', 'max:4096'],
        ]);
    }

    private function parseTags(string $input): array
    {
        return array_values(array_filter(array_map('trim', explode(',', $input))));
    }

    private function parseLines(string $input): array
    {
        return array_values(array_filter(array_map('trim', explode("\n", $input))));
    }
}
