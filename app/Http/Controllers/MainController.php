<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\View\View;
use App\Models\Teacher;
use App\Models\Subject;


class MainController extends Controller
{
    public function index(): view
    {
        $testimonial = Testimonial::where('active', 1)->get();
        return view('index', compact('testimonial'));
    }
    public function testimonial()
    {
        $testimonial = Testimonial::where('active', 1)->get();
        return view('testimonial', compact('testimonial'));
    }
}
