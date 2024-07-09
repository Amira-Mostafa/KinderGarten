@extends('layouts.adminDashboard')
@section('title, Show Subject')
@section('content')

<hr>
<br><br>
<div class="container">
    <div class="team-single">
        <div class="row">

            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img">
                    <img src="{{ asset('assets/images/' . $subjects->image)}}" class="img-fluid" alt="{{ $subjects->subject}}">
                </div>
            </div>

            <div class="col-lg-8 col-md-7">
                <div class="team-single-text padding-50px-left sm-no-padding-left">
                    <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ $subjects->subject }}</h4>
                    <p class="no-margin-bottom">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum voluptatem.</p>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>
@endsection
@endsection