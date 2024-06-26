    @extends('layouts.template')

    @section('title')
    Home Page
    @endsection


    @section('content')

    @include('includes.Carousel')
    @include('includes.Facilities')
    @include('includes.about')
    @include('includes.callToAction')
    @include('includes.Classes')
    @include('includes.Appointment')
    @include('includes.Team')
    @include('includes.Testimonial')

    @endsection