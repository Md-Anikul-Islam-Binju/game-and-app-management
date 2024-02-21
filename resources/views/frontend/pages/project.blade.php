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
                    <div class="blog_left_sidebar">
                        <div class="row g-3">
                            @foreach($projects as $projectData)
                            <div class="col-12 col-md-6">
                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="{{URL::to('images/project/'. $projectData->image )}}" alt="">

                                    </div>
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="{{route('project.details',$projectData->id)}}">
                                            <h2 class="blog-head">
                                                @if (session('locale') == 'en')
                                                    {{$projectData->title}}
                                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                    {{$projectData->title_bn}}
                                                @endif
                                            </h2>
                                        </a>
                                        <p>
                                            @if (session('locale') == 'en')
                                                {!! Str::limit($projectData->details, 150) !!}
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                {!! Str::limit($projectData->details_bn, 150) !!}
                                            @endif

                                        </p>
                                        <ul class="blog-info-link">
                                            <li>
{{--                                                @if (!empty($projectData->categories))--}}
{{--                                                    {{ implode(', ', $projectData->categories) }}--}}
{{--                                                @endif--}}
                                                @if (!empty($projectData->categories))
                                                    @php $categories = is_string($projectData->categories) ? json_decode($projectData->categories, true) : $projectData->categories; @endphp

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
                                    </div>
                                </article>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="{{ url()->current() }}" method="GET">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" name="title" class="form-control" placeholder="{{session('locale') == 'en'? "Search Keyword":"অনুসন্ধান করুন"}}">
                                        <div class="input-group-append d-flex">
                                            <button class="boxed-btn2" type="submit">
                                                @if (session('locale') == 'en')
                                                    Search
                                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                    অনুসন্ধান
                                                @endif
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">
                                @if (session('locale') == 'en')
                                    Project Category
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    প্রজেক্ট ক্যাটাগরি
                                @endif
                            </h4>
                            <ul class="list cat-list">
                                @foreach($projectCategory as $projectCategoryData)
                                <li>
                                    <a href="{{route('project.pages',$projectCategoryData->id)}}" class="d-flex">
                                        <p>
                                            @if (session('locale') == 'en')
                                                {{$projectCategoryData->name}}
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                {{$projectCategoryData->name_bn}}
                                            @endif
                                        </p>

                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
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
                                                @if (session('locale') == 'en')
                                                    <h3>{{$projectLatestData->title}}</h3>
                                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                    <h3>{{$projectLatestData->title_bn}}</h3>
                                                @endif

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
