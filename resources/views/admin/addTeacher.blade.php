@extends('layouts.adminDashboard')
@section('title, Add Teacher')
@section('content')

<br><br>
<div class="container px-4 px-lg-5 py-lg-0">
    <h2 class="ml-50">Become a Teacher</h2>
    <br />

    <form action="{{ route('storeTeacher') }}" method="post" enctype="multipart/form-data" class="mx-auto" data-parsley-validate class="form-horizontal form-label-left">
        @csrf

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Full Name<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" id="first-name" class="form-control" name="name" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="item form-group">
                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email<span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 ">
                    <input id="email" class="form-control" type="email" name="email" value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="item form-group col-md-6 col-sm-6">

            <label for="subject_1" class="col-form-label col-md-6 col-sm-6 label-align">First Prefrence<span class="required">*</span></label>
            <select name="subjects[]" class="form-control" id="">
                <option value="">select subject</option>
                @foreach($subjects as $sub)
                <option value=" {{ $sub->id }}" {{ old('subjects.0') == $sub->id ? 'selected' : '' }}>{{ $sub->subject}}</option>
                @endforeach
            </select>
            @if ($errors->has('subjects.0'))
            <div class="alert alert-warning mt-2" role="alert">
                {{ $errors->first('subjects.0') }}
            </div>
            @endif
            <label for="subject" class="col-form-label col-md-6 col-sm-6 label-align">Second Prefrence<span class="required">*</span></label>
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
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="fb">Facebook Account link<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="link" id="user-link" name="fb" class="form-control" value="{{old('fb')}}">
                @error('fb')
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="twitter">Twitter Account link <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="link" id="user-link" name="twitter" value="{{old('twitter')}}" class="form-control">
                    @error('twitter')
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="user-name">Instagram Account link <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="link" id="user-link" name="insta" class="form-control" value="{{old('insta')}}">
                    @error('insta')
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Profile Image <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 ">
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