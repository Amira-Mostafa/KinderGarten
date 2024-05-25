@extends('layouts.adminDashboard')
@section('title, Add Teacher')
@section('content')


<div class="container px-4 px-lg-5 py-lg-0">
<h2 class="ml-50">Become a Teacher</h2>
    <br/>

    <form action="{{ route('storeTeacher') }}" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
            @csrf


        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="first-name" required="required" class="form-control" name="name" value="">
            </div>

        <div class="item form-group">
            <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
                <input id="email" class="form-control" type="email" name="email" required="required" value="">
            </div>
        </div>

        </div>


            <div class="item form-group">
            <label for="category" class="col-form-label col-md-3 col-sm-3 label-align">Subject Prefrence 1<span class="required">*</span></label>
            <select name="subject_id" id="">
                <option value="">select subject</option> 
                @foreach($subjects as $sub)
                  <option value="{{ $sub->id }}">{{ $sub->subject}}</option> 
                @endforeach
            </select>
            </div>
            <div class="item form-group">
            <label for="category" class="col-form-label col-md-3 col-sm-3 label-align">Subject Prefrence 2<span class="required">*</span></label>
            <select name="subject_id" id="">
                <option value="">select subject</option> 
                @foreach($subjects as $sub)
                  <option value="{{ $sub->id }}">{{ $sub->subject}}</option> 
                @endforeach
            </select>
            </div>

            <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fb">Facebook Account link<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="link" id="user-link" name="fb" class="form-control">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="twitter">Twitter Account link <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="link" id="user-link" name="twitter" class="form-control">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Instagram Account link <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="link" id="user-link" name="insta" class="form-control">
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Profile Image <span class="required">*</span>
            <div class="col-md-6 col-sm-6 ">
                <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image" value = "">
        </div>
        </div>


    

        <div class="ln_solid"></div>

        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </div>


    </form>
</div>



@endsection
@endsection