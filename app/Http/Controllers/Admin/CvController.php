<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CvController extends Controller {
    public function upload(Request $request) {
        $request->validate(['cv' => ['required', 'mimes:pdf', 'max:10240']]);
        $request->file('cv')->storeAs('cv', 'emmanuel-mwangata-cv.pdf', 'public');
        return back()->with('success', 'CV uploaded successfully.');
    }
}
