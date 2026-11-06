<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StaticPageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function skills()
    {
        return view('pages.skills');
    }

    public function experience()
    {
        return view('pages.experience');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function resume()
    {
        $cvPath = storage_path('app/public/cv/emmanuel-mwangata-cv.pdf');

        if (file_exists($cvPath)) {
            return response()->download($cvPath, 'Emmanuel-Mwangata-CV.pdf');
        }

        // If no CV uploaded, redirect to about page with note
        return redirect()->route('about')
            ->with('error', 'CV is not currently available for download. Please contact me directly.');
    }
}
