@extends('layouts.adminDashboard')
@section('title, Edit Class')
@section('content')

<br><br>
<div class="container px-4 px-lg-5 py-lg-0 ">
    <h2 class="ml-50 offset-md-3">Edit Class</h2>
    <br />

    <form action="{{ route('updateClass', $classes->id ) }}" method="post" enctype="multipart/form-data" class="mx-auto" data-parsley-validate class="form-horizontal form-label-left">
        @csrf
        @method('put')

        <div class="item form-group col-md-6 col-sm-6 offset-md-3">
            <label for="subject" class="col-form-label col-md-3 col-sm-3 label-align">Select Subject<span class="required">*</span></label>
            <select name="subject_id" class="form-control" id="subject">
                <option value="">select subject</option>
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $classes->subject_id == $subject->id ? 'selected' : ''}}>{{ $subject->subject}}</option>
                @endforeach
            </select>
        </div>

        <div class="item form-group col-md-6 col-sm-6 offset-md-3">
            <label for="teacher" class="col-form-label col-md-3 col-sm- 3 label-align">Select Teacher<span class="required">*</span></label>
            <select name="teacher_id" class="form-control" id="teacher">
                <option value="">select Teacher</option>
                @foreach($teachers as $teacher)
                <option value="{{ $teacher->id}}" {{ $classes->teacher_id == $teacher->id ? 'selected' : ''}}>{{ $teacher->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-6 col-sm-6 offset-md-3">
            <label for="capacity">Capacity:</label>
            <input type="number" step="1" class="form-control" id="capacity" value="{{ $classes->capacity }}" placeholder="Enter capacity" name="capacity">
            @error('capacity')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group col-md-6 col-sm-6 offset-md-3">
            <label for="price">Price:</label>
            <input type="number" step="0.1" class="form-control" id="price" value="{{ $classes->price }}" placeholder="Enter price" name="price">
            @error('price')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group col-md-6 col-sm-6 offset-md-3">
            <label for="ageGroup">AgeGroup:</label>
            <input type="text" class="form-control" id="ageGroup" value="{{ $classes->ageGroup }}" placeholder="Enter ageGroup" name="ageGroup">
            @error('ageGroup')
            <div class="alert alert-danger">
                <strong>Error!!</strong> {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group col-md-6 col-sm-6 offset-md-3">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <label class="form-label" for="form1Example2">start: </label>
                    <input type="time" class="form-control" name="start" value="{{ $classes->start }}">
                    @error('start')
                    <div class="alert alert-danger">
                        <strong>Error!!</strong> {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 col-sm-6">
                    <label class="form-label" for="form1Example2">end: </label>
                    <input type="time" class="form-control" name="end" value="{{ $classes->end }}">
                    @error('end')
                    <div class="alert alert-danger">
                        <strong>Error!!</strong> {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group col-md-6 col-sm-6 offset-md-3">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Active</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" @checked($classes->active) class="flat" name="active">
                </label>
            </div>
        </div>

        <hr class="form-group col-md-6 col-sm-6 offset-md-3">

        <div class="ln_solid"></div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-5">
                <br>
                <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
                <button type="submit" class="btn btn-success">Update</button>
                <br>
            </div>
        </div>

    </form>
</div>



@endsection
@endsection