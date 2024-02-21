@extends('frontend.index')
@section('home_content')

    <section class="slider-area">
        <div class="slider-height2 slider-bg6 hero-overly02 d-flex align-items-center" style="background-image: url({{asset($siteInfo->news_banner )}})">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="hero-caption hero-caption2 text-center">
                            <h2>
                                @if (session('locale') == 'en')
                                    News Details
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    বিস্তারিত নিউজ
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog_area section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="single_post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{URL::to('images/news/'. $newsDetails->image )}}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2 style="color: #2d2d2d;">
                                @if (session('locale') == 'en')
                                    {{$newsDetails->title}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$newsDetails->title_bn}}
                                @endif
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                             <span><i class="fa fa-calendar me-1"></i>
                                    @if (session('locale') == 'en')
                                     {{ \Carbon\Carbon::parse($newsDetails->date)->format('d M Y') }}
                                 @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                         <?php
                                         $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                         $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                         $bengaliMonths = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

                                         $day = \Carbon\Carbon::parse($newsDetails->date)->format('d');
                                         $monthIndex = \Carbon\Carbon::parse($newsDetails->date)->format('n') - 1;
                                         $year = \Carbon\Carbon::parse($newsDetails->date)->format('Y');

                                         $bengaliDay = '';
                                         $bengaliYear = '';

                                         $dayLength = strlen($day);
                                         $yearLength = strlen($year);

                                         for ($i = 0; $i < $dayLength; $i++) {
                                             $digit = intval($day[$i]);
                                             $bengaliDay .= isset($bengaliNumerals[$digit]) ? $bengaliNumerals[$digit] : $day[$i];
                                         }

                                         for ($i = 0; $i < $yearLength; $i++) {
                                             $digit = intval($year[$i]);
                                             $bengaliYear .= isset($bengaliNumerals[$digit]) ? $bengaliNumerals[$digit] : $year[$i];
                                         }
                                         ?>
                                     {{ $bengaliDay }} {{ $bengaliMonths[$monthIndex] }} {{ $bengaliYear }}
                                 @endif
                                </span>
                            </ul>
                            <p>
                                @if (session('locale') == 'en')
                                    {!! $newsDetails->details !!}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {!! $newsDetails->details_bn !!}
                                @endif

                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
