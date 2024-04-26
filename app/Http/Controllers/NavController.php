<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavController extends Controller
{
    public function aboutUs() {
        return view('about');
    }
    public function classes() {
        return view('classes');
        
    }
    public function facilities() {
        return view('facility');
    }
    public function team() {
        return view('team');
    }
    public function callToAction() {
        return view('call-To-action');
    }
    public function appointment() {
        return view('appointment');
    }
    public function testimonial() {
        return view('testimonial');
    }
    public function contact() {
        return view('contact');
    }
}
