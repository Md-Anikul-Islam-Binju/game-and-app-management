@extends('frontend.index')
@section('home_content')
    <section class="slider-area">
        <div class="slider-height2 slider-bg6 hero-overly02 d-flex align-items-center" style="background-image: url({{asset($siteInfo->training_banner )}})">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="hero-caption hero-caption2 text-center">
                            <h2>
                                @if (session('locale') == 'en')
                                    Training
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    প্রশিক্ষণ
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

            <div class="row justify-content-center">
                @foreach($training as $trainingData)
                    <div class="col-lg-4 col-md-6 col-sm-6 trainings_card_padding">
                        <div class="trainings">
                            <div class="trainings_card">
                                <div class="trainings_img">
                                    <a href="#">
                                        <img src="{{URL::to('images/training/'. $trainingData->image )}}" alt="Image" class="img-fluid">
                                    </a>
                                    <div class="img_text">
                                        <span class="open">
                                            @if (session('locale') == 'en')
                                                {{$trainingData->name}}
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                {{$trainingData->name_bn}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="trainings_caption">
                                    <h3>
                                        <a href="#">
                                            @if (session('locale') == 'en')
                                                {{$trainingData->name}}
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                {{$trainingData->name_bn}}
                                            @endif
                                        </a>
                                    </h3>
                                    <p>
                                        @if (session('locale') == 'en')
                                            {!! Str::limit($trainingData->details, 50) !!}.
                                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            {!! Str::limit($trainingData->details_bn, 50) !!}.
                                        @endif
                                    </p>
                                </div>
                                <div class="trainings_footer d-flex justify-content-between align-items-center">
                                    <div class="class-day">
                                        <span class="color-font1">
                                            @if (session('locale') == 'en')
                                                {{ \Carbon\Carbon::parse($trainingData->start_date)->format('d M Y') }}
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                    <?php
                                                    $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                                    $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                                    $bengaliMonths = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

                                                    $day = \Carbon\Carbon::parse($trainingData->start_date)->format('d');
                                                    $monthIndex = \Carbon\Carbon::parse($trainingData->start_date)->format('n') - 1;
                                                    $year = \Carbon\Carbon::parse($trainingData->start_date)->format('Y');

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
                                        <p>
                                            @if (session('locale') == 'en')
                                                Start Date
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                শুরু
                                            @endif
                                        </p>
                                    </div>
                                    <div class="class-day">
                                        <span class="color-font2">
                                            @if (session('locale') == 'en')
                                                {{$trainingData->total_student}}
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                @php
                                                    $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                                    $numberData = $trainingData->total_student;
                                                    $counterNoBengali = '';
                                                    foreach (str_split($numberData) as $digit) {
                                                        $counterNoBengali .= $bengaliNumerals[$digit];
                                                    }
                                                @endphp
                                                {{$counterNoBengali}}
                                            @endif
                                        </span>
                                        <p>
                                            @if (session('locale') == 'en')
                                                Total Student
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                মোট ছাত্র
                                            @endif
                                        </p>
                                    </div>
                                    <div class="class-day">
                                        <span class="color-font1">
                                            @if (session('locale') == 'en')
                                                {{$trainingData->duration}}/h
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                @php
                                                    $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                                    $numberData = $trainingData->duration;
                                                    $counterNoBengali = '';
                                                    foreach (str_split($numberData) as $digit) {
                                                        $counterNoBengali .= $bengaliNumerals[$digit];
                                                    }
                                                @endphp
                                                {{$counterNoBengali}}/ঘন্টা
                                            @endif
                                        </span>
                                        <p>
                                            @if (session('locale') == 'en')
                                                Duration
                                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                                সময়
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
