<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class ExperienceController extends Controller {
    public function index() { return view('admin.experiences.index'); }
}
