@extends('layouts.adminDashboard')
@section('title, Show Testimonial')
@section('content')

<hr>
<br><br>
<div class="container">
    <div class="team-single">
        <div class="row">

            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img">
                    <img src="{{ asset('assets/images/' . $testimonials->image)}}" class="img-fluid" alt="{{ $testimonials->name}}">
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="team-single-text padding-50px-left sm-no-padding-left">
                    <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ $testimonials->name }}</h4>
                    <p class="no-margin-bottom">{{ $testimonials -> profession}}</p>
                    <p class="no-margin-bottom">{{ $testimonials -> comment}}</p>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>
@endsection
@endsection