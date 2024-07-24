@extends('layouts.adminDashboard')
@section('title, Add Testimonial')
@section('content')

<br><br>
<div class="container px-4 px-lg-5 py-lg-0">
    <h2 class="ml-50">Testimonial</h2>
    <br />

    <form action="{{ route('storeTestimonial') }}" method="post" enctype="multipart/form-data" class="mx-auto" data-parsley-validate class="form-horizontal form-label-left">
        @csrf

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Your Name<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="first-name" class="form-control" name="name" value="{{old('name')}}">
            </div>

            <div class="item form-group">
                <label for="profession" class="col-form-label col-md-3 col-sm-3 label-align">Profession<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input id="text" class="form-control" type="profession" name="profession" value="{{old('profession')}}">
                </div>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="comment">Your Comment<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="text" name="comment" class="form-control" value="{{old('comment')}}">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Image<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="file" id="image" name="image" class="form-control" value="{{old('image')}}">
            </div>
        </div>

        <div class="ln_solid"></div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <br>
                <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                <button type="submit" class="btn btn-success">Add</button>
                <br>
            </div>
        </div>

    </form>
</div>



@endsection
@endsection