<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\View\View;
use App\Models\Teacher;
use App\Models\classes;
use App\Models\Subject;


class MainController extends Controller
{

    public function index(): view
    {
        $teachers = Teacher::with('subjects')->where('active', 1)->get();
        $testimonial = Testimonial::where('active', 1)->get();
        $classes = Classes::with('subject', 'teacher')->where('active', 1)->get();
        return view('index', compact('testimonial', 'teachers', 'classes'));
    }

    public function testimonial()
    {
        $testimonial = Testimonial::where('active', 1)->get();
        return view('testimonial', compact('testimonial'));
    }

    public function team()
    {
        $teachers = Teacher::where('active', 1)->get();
        return view('team', compact('teachers'));
    }

    public function classes()
    {
        $classes = Classes::with('subject', 'teacher')->where('active', 1)->get();
        return view('classes', compact('classes'));
    }

    public function aboutUs()
    {
        return view('about');
    }

    public function facilities()
    {
        return view('facility');
    }

    public function callToAction()
    {
        return view('call-To-action');
    }
    public function appointment()
    {
        return view('appointment');
    }

    public function contact()
    {
        return view('contact');
    }
}
