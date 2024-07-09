<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\View\View;
use App\Models\Teacher;
use App\Models\Subject;

class NavController extends Controller
{



    public function index()
    {
        $teachers = Teacher::where('active', 1)->get();
        $testimonial = Testimonial::where('active', 1)->get();
        return view('index', compact('testimonial', 'teachers'));
    }
    public function aboutUs()
    {
        return view('about');
    }
    public function classes()
    {
        return view('classes');
    }
    public function facilities()
    {
        return view('facility');
    }
    public function team()
    {
        return view('team');
    }
    public function callToAction()
    {
        return view('call-To-action');
    }
    public function appointment()
    {
        return view('appointment');
    }
    public function testimonial()
    {
        $testimonial = Testimonial::where('active', 1)->get();
        return view('testimonial', compact('testimonial'));
    }
    public function contact()
    {
        return view('contact');
    }
}
