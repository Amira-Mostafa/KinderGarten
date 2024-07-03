@extends('layouts.adminDashboard')
@section('title, Add Teacher')
@section('content')


<div class="container px-4 px-lg-5 py-lg-0">
    <h2 class="ml-50">Edit Teacher</h2>
    <br />


    <form action="{{ route('updateTeacher', $teachers->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
        @csrf
        @method("put")

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="first-name" required="required" class="form-control" name="name" value="{{ $teachers->name }}">
                @error('name')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="item form-group">
                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input id="email" class="form-control" type="email" name="email" required="required" value="{{ $teachers->email }}">
                    @error('email')
                    <div class="alert alert-warning">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>

        </div>

        @foreach ($teachers->subjects as $rows)
        <div class="item form-group">
            <label for="subject" class="col-form-label col-md-3 col-sm-3 label-align">Subject Prefrence<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select name="subjects[]" id="subject_{{$rows->id}}" class="col-md-3 col-sm-3 form-control">
                    <option value="">select subject</option>
                    @foreach($allSubjects as $subject)
                    <option value="{{ $subject->id }}" @if($subject->id == $rows->class->subject_id) selected @endif>{{ $subject->subject}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @error('subjects.' . ($loop->index))
        <div class="alert alert-warning">{{ $message }}</div>
        @enderror
        @endforeach



        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fb">Facebook Account link<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="link" id="user-link" name="fb" class="form-control" value="{{ $teachers->fb }}">
                @error('fb')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="twitter">Twitter Account link <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="link" id="user-link" name="twitter" value="{{ $teachers->twitter }}" class="form-control">
                @error('twitter')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Instagram Account link <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="link" id="user-link" name="insta" value="{{ $teachers->insta }}" class="form-control">
                @error('insta')
                <div class="alert alert-warning">
                    {{$message}}
                </div>
                @enderror
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" @checked($teachers->active) class="flat" name="active">
                </label>
            </div>
        </div>


        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Profile Image <span class="required">*</span>
                <div class="">
                    <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image" value="{{ old('image') }}">
                    @error('image')
                    <div class="alert alert-warning">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                    <img src="{{asset('assets/images/'.$teachers->image)}}" class="img-fluid" alt="{{ $teachers->name }}">

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