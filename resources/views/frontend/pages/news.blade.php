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
                                    Latest News
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    সর্বশেষ নিউজ
                                @endif

                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
{{--            <div class="row section_heading">--}}
{{--                <div class="col-lg-7 text-center mx-auto">--}}
{{--                    <h2 class="heading">--}}
{{--                        @if (session('locale') == 'en')--}}
{{--                            Latest News--}}
{{--                        @elseif (session('locale') == 'bn' || !session()->has('locale'))--}}
{{--                            সর্বশেষ নিউজ--}}
{{--                        @endif--}}


{{--                    </h2>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row justify-content-center">
                @foreach($news as $newsData)
                <div class="col-md-6 col-lg-4">
                    <div class="news_entry">
                        <a href="{{route('news.details',$newsData->id)}}" class="news_image" style="background-image: url('{{URL::to('images/news/'. $newsData->image )}}');"></a>
                        <div class="news_text">
                            <p class="meta">
                                <span><i class="fa fa-calendar me-1"></i>
                                    @if (session('locale') == 'en')
                                        {{ \Carbon\Carbon::parse($newsData->date)->format('d M Y') }}
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            <?php
                                            $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                            $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                            $bengaliMonths = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

                                            $day = \Carbon\Carbon::parse($newsData->date)->format('d');
                                            $monthIndex = \Carbon\Carbon::parse($newsData->date)->format('n') - 1;
                                            $year = \Carbon\Carbon::parse($newsData->date)->format('Y');

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
                            </p>
                            <h3 class="mb-4">
                                <a href="#">

                                    @if (session('locale') == 'en')
                                        {{$newsData->title}}
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            {{$newsData->title_bn}}
                                    @endif

                                </a>
                            </h3>
                            <p>

                                @if (session('locale') == 'en')
                                    {!! Str::limit($newsData->details, 100) !!}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {!! Str::limit($newsData->details_bn, 100) !!}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection



