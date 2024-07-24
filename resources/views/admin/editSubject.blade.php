@extends('layouts.adminDashboard')
@section('title, edit Subject')
@section('content')

<br><br>
<div class="container px-4 px-lg-5 py-lg-0">
    <h2 class="ml-50">Edit Subject</h2>
    <br />


    <form action="{{ route('updateSubject', $subjects->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
        @csrf
        @method("put")

        <label class="col-form-label col-md-3 col-sm-3 label-align" for="subject">Full Name <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="text" id="subject" required="required" class="form-control" name="subject" value="{{ $subjects->subject }}">
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Profile Image <span class="required">*</span>
                <div class="">
                    <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image" value="{{ old('image') }}">
                    <br>
                    <img src="{{asset('assets/images/'.$subjects->image)}}" class="img-fluid" alt="{{ $subjects->subject }}">

                </div>
        </div>

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