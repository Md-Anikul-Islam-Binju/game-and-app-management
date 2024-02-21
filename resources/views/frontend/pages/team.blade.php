@extends('frontend.index')
@section('home_content')
    <section class="slider-area">
        <div class="slider-height2 slider-bg6 hero-overly02 d-flex align-items-center" style="background-image: url({{asset($siteInfo->team_banner )}}" alt="">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="hero-caption hero-caption2 text-center">
                            <h2>
                                @if (session('locale') == 'en')
                                    Team Member
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    টিম সদস্য
                                @endif

                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section team">
        <div class="container">
            <div class="row justify-content-center">
                @foreach($teamMember as $teamMemberData)
                    <div class="col-lg-3 col-md-6">
                        <div class="box">
                            <div class="image">
                                <img src="{{asset('images/team/'. $teamMemberData->image )}}" alt="{{$teamMemberData->name}}" class="img-fluid">
                                <div class="social-icons">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                            <h3>{{$teamMemberData->name}}</h3>
                            <h4>{{$teamMemberData->designation}}<br>{{$teamMemberData->email}}<br>{{$teamMemberData->phone}}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection



