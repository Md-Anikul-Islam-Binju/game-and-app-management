@extends('frontend.index')
@section('home_content')


    <section class="section about_bg" style="background-image: url('{{URL::to('frontend/assets/images/section_bg02.jpg.webp')}}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="support_location_img">
                        <img src="{{asset('images/about/'. $about->image )}}" alt="Image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right_caption">
                        <h2>
                            @if (session('locale') == 'en')
                                About Us
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                আমাদের সম্পর্কে
                            @endif

                        </h2>
                        <div class="pera_top">
                            @if (session('locale') == 'en')
                                {!! $about->details !!}
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                {!! $about->details_bn !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
