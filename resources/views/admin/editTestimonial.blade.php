@extends('layouts.adminDashboard')
@section('title, edit Testmonial')
@section('content')

<br><br>
<div class="container px-4 px-lg-5 py-lg-0">
    <h2 class="ml-50">Edit Teacher</h2>
    <br />


    <form action="{{ route('updateTestimonial', $testimonials->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
        @csrf
        @method("put")

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">name<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="first-name" required="required" class="form-control" name="name" value="{{ $testimonials->name }}">
            </div>

            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">profession<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="profession" required="required" class="form-control" name="Profession" value="{{ $testimonials->Profession }}">
            </div>

            <div class="item form-group">
                <label for="comment" class="col-form-label col-md-3 col-sm-3 label-align">Comment<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <textarea name="comment" class="form-control" required="required" id="comment">{{ $testimonials->comment }}</textarea>
                </div>
            </div>

        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" @checked($testimonials->active) class="flat" name="active">
                </label>
            </div>
        </div>


        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Profile Image <span class="required">*</span>
                <div class="">
                    <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image" value="{{ old('image') }}">
                    <br>
                    <img src="{{asset('assets/images/'.$testimonials->image)}}" class="img-fluid" alt="{{ $testimonials->name }}">
                </div>
        </div>


</div>

<div class="ln_solid"></div>

<div class="item form-group">
    <div class="col-md-6 col-sm-6 offset-md-3">
        <br>
        <button class="btn btn-primary" type="button">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
        <br>
    </div>
</div>


</form>
</div>

@endsection
@endsection