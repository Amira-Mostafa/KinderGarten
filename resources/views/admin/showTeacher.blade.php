@extends('layouts.adminDashboard')
@section('title, Show Teacher')
@section('content')

<hr>
<br><br>
<div class="container">
    <div class="team-single">
        <div class="row">

            <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                <div class="team-single-img">
                    <img src="{{ asset('assets/images/' . $teachers->image)}}" class="img-fluid" alt="{{ $teachers->name}}">
                </div>

            </div>

            <div class="col-lg-8 col-md-7">
                <div class="team-single-text padding-50px-left sm-no-padding-left">
                    <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ $teachers->name }}</h4>
                    <p class="no-margin-bottom">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum voluptatem.</p>
                    <div class="contact-info-section margin-40px-tb">
                        <ul class="list-style9 no-margin">
                            <li>

                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-envelope text-orange"></i>
                                        <strong class="margin-10px-left text-orange">Email</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $teachers->email }}</p>
                                    </div>
                                </div>
                            </li>

                            @if($teachers->subjects->count() >= 0)
                            @foreach($teachers->subjects as $sub)
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-envelope text-lightred"></i>
                                        <strong class="margin-10px-left text-lightred">Teaching Preferences no: {{ $sub->class->preference }}</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p>{{ $sub->subject }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @else
                            <p>No subject preference are assigned</p>
                            @endif

                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-envelope text-pink"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-pink">Facebook link</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><a href="javascript:void(0)">{{ $teachers->fb }}</a></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-envelope text-pink"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-pink">Instagram link</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><a href="javascript:void(0)">{{ $teachers->insta }}</a></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-5 col-5">
                                        <i class="fas fa-envelope text-pink"></i>
                                        <strong class="margin-10px-left xs-margin-four-left text-pink">Twitter link</strong>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        <p><a href="javascript:void(0)">{{ $teachers->twitter }}</a></p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>




                </div>

            </div>
        </div>


    </div>
</div>
</div>
<br><br>

@endsection
@endsection