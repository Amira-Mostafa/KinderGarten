@extends('layouts.adminDashboard')
@section('title, add Subject')
@section('content')


<div class="container px-4 px-lg-5 py-lg-0">
    <h2 class="ml-50">Insert Subject</h2>
    <br />

    <form action="{{ route('storeSubject') }}" method="Post" enctype="multipart/form-data" class="mx-auto" data-parsley-validate class="form-horizontal form-label-left">
        @csrf

        <div class="item form-group">
            <label for="subject" class="col-form-label col-md-3 col-sm-3 label-align">Subject<span class="required">*</span></label>
            <div class="col-sm-6">
                <input type="text" name="subject" class="form-control" value="{{old('subject')}}">
            </div>
        </div>

        <div class="item form-group">
            <br>
            <label class="col-form-label col-sm-3 label-align" for="image">subject image <span class="required"></span>*</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" id="image" name="image" value="{{ old('image')}}">
            </div>
        </div>


        <div class="form-group">
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <br>
        </div>
    </form>
</div>

@endsection
@endsection