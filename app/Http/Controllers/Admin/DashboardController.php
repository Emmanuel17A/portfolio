<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects'        => Project::count(),
            'live_projects'   => Project::where('status', 'live')->count(),
            'messages'        => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentProjects'));
    }
}
