<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();

        $defaults = [
            'availability'      => 'available',
            'stat_years'        => '4',
            'stat_projects'     => '20',
            'stat_technologies' => '8',
            'tagline'           => 'I build software that works.',
            'meta_description'  => 'Full-stack software developer building practical, modern web applications. Based in Zambia. Available for freelance projects.',
        ];

        $settings = array_merge($defaults, $settings);

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'availability'      => ['required', 'in:available,busy,unavailable'],
            'stat_years'        => ['required', 'integer', 'min:0'],
            'stat_projects'     => ['required', 'integer', 'min:0'],
            'stat_technologies' => ['required', 'integer', 'min:0'],
            'tagline'           => ['required', 'string', 'max:255'],
            'meta_description'  => ['nullable', 'string', 'max:1000'],
        ]);

        foreach ($validated as $key => $value) {
            SiteSetting::set($key, $value);
        }

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Site settings updated successfully.');
    }
}

