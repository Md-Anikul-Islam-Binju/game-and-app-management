@extends('frontend.index')
@section('home_content')
    <section class="slider-area">
        <div class="slider-height2 slider-bg6 hero-overly02 d-flex align-items-center" style="background-image: url({{asset($siteInfo->project_banner )}})">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="hero-caption hero-caption2 text-center">
                            <h2>
                                @if (session('locale') == 'en')
                                    Project
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    প্রজেক্ট
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
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="single_post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{URL::to('images/project/'. $project->image )}}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2 style="color: #2d2d2d;">
                                @if (session('locale') == 'en')
                                    <h3>{{$project->title}}</h3>
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    <h3>{{$project->title_bn}}</h3>
                                @endif
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li>




                                        @if (!empty($project->categories))
                                            @php $categories = is_string($project->categories) ? json_decode($project->categories, true) : $project->categories; @endphp

                                            @if (!empty($categories))
                                                @foreach ($categories as $categoryNameBn => $categoryName)
                                                    @if (session('locale') == 'bn' || !session()->has('locale'))
                                                        {{ $categoryNameBn }}
                                                    @else
                                                        {{ $categoryName }}
                                                    @endif
                                                    @if (!$loop->last), @endif
                                                @endforeach
                                            @endif
                                        @endif





                                </li>
                            </ul>
                            <p class="excert">
                                @if (session('locale') == 'en')
                                    {!! $project->details !!}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {!! $project->details_bn !!}
                                @endif
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">
                                @if (session('locale') == 'en')
                                    Recent Projects
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    সাম্প্রতিক প্রজেক্ট
                                @endif
                            </h3>
                            @foreach($projectLatest as $projectLatestData)
                                <div class="media post_item">
                                    <a href="{{route('project.details',$projectLatestData->id)}}">
                                    <img src="{{URL::to('images/project/'. $projectLatestData->image )}}" alt="post">
                                    <div class="media-body">
                                        <a href="#">
                                            <h3>
                                                @if (session('locale') == 'en')
                                                    <h3>{{$projectLatestData->title}}</h3>
                                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                    <h3>{{$projectLatestData->title_bn}}</h3>
                                                @endif
                                            </h3>
                                        </a>
                                        <p>
                                            @if (session('locale') == 'en')
                                                {{ \Carbon\Carbon::parse($projectLatestData->created_at)->format('d M Y') }}
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                    <?php
                                                    $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                                    $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                                    $bengaliMonths = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

                                                    $day = \Carbon\Carbon::parse($projectLatestData->created_at)->format('d');
                                                    $monthIndex = \Carbon\Carbon::parse($projectLatestData->created_at)->format('n') - 1;
                                                    $year = \Carbon\Carbon::parse($projectLatestData->created_at)->format('Y');

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
                                        </p>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
