@extends('layouts.adminDashboard')
@section('title, Add Class')
@section('content')

<div class="container px-4 px-lg-5 py-lg-0">
    <h2 class="ml-50">register A Class</h2>
    <br />

    <form action="{{ route('storeClass') }}" method="post" enctype="multipart/form-data" class="mx-auto" data-parsley-validate class="form-horizontal form-label-left">
        @csrf


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
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Class<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="first-name" class="form-control" name="subject" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="item form-group">
            <label for="subject_1" class="col-form-label col-md-3 col-sm-3 label-align">Subject Prefrence 1<span class="required">*</span></label>
            <select name="subjects[]" class="form-control" id="">
                <option value="">select subject</option>
                @foreach($subjects as $sub)
                <option value="{{ $sub->id }}" {{ old('subjects.0') == $sub->id ? 'selected' : '' }}>{{ $sub->subject}}</option>
                @endforeach
            </select>

            @if ($errors->has('subjects.0'))
            <div class="alert alert-warning mt-2" role="alert">
                {{ $errors->first('subjects.0') }}
            </div>
            @endif

        </div>

        <div class="item form-group">
            <label for="subject" class="col-form-label col-md-3 col-sm-3 label-align">Subject Prefrence 2<span class="required">*</span></label>
            <select name="subjects[]" class="form-control" id="">
                <option value="">select subject</option>
                @foreach($subjects as $sub)
                <option value="{{ $sub->id }}" {{old('subjects.1') == $sub->id ? 'selected':''}}>{{ $sub->subject}}</option>
                @endforeach
            </select>
            @if ($errors->has('subjects.1'))
            <div class="alert alert-warning mt-2" role="alert">
                {{ $errors->first('subjects.1') }}
            </div>
            @endif
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Profile Image <span class="required">*</span>
                <div class="">
                    <input type="file" class="form-control" id="image" placeholder="Enter Image" value="{{old('image')}}" name="image">
                    @error('image')
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                    @enderror
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