@extends('frontend.index')
@section('home_content')
<div class="slider-area">
        <div class="slider-active dot-style">
            @foreach($slider as $sliderData)
            <div class="single-slider slider-height hero-overly slider-bg1 d-flex align-items-center">
{{--                <div class="container justify-content-center">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xl-12">--}}
{{--                            <div class="hero-caption text-center">--}}
{{--                                <h1 data-animation="fadeInUp" data-delay=".4s">{{$sliderData->title}}</h1>--}}
{{--                                <p data-animation="fadeInUp" data-delay=".4s">{!! $sliderData->details  !!}</p>--}}
{{--                                <a href="#" class="btn_1 hero-btn" data-animation="bounceIn" data-delay=".8s">View Our Services</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <img src="{{asset('images/slider/'. $sliderData->file )}}" alt="">
            </div>
            @endforeach
        </div>
    </div>
<!-- ! Statistics Section Area -->
@if($counter->count() > 0)
<section class="main-stats-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="sdmga-counter-bar-content">
                    <div class="single-sdmga-counter-area">
                        <div class="sdmga-counter-icon">
                            <img src="{{ asset('frontend/assets/images/school.png') }}" alt="" loading="lazy">
                        </div>
                        <div class="sdmga-counter-content">
                            <h3 class="number">
                                @if (session('locale') == 'en')
                                    {{$counter[0]->counter_no}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    @php
                                        $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                        $counterData = $counter[0]->counter_no;
                                        $counterNoBengali = '';
                                        foreach (str_split($counterData) as $digit) {
                                            $counterNoBengali .= $bengaliNumerals[$digit];
                                        }
                                    @endphp
                                    {{$counterNoBengali}}
                                @endif
                            </h3>
                            <span>
                                @if (session('locale') == 'en')
                                    {{$counter[0]->counter_name}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$counter[0]->counter_name_bn}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="single-sdmga-counter-area">
                        <div class="sdmga-counter-icon">
                            <img src="{{ asset('frontend/assets/images/student.png') }}" alt="" loading="lazy">
                        </div>
                        <div class="sdmga-counter-content">
                            <h3 class="number">
                                @if (session('locale') == 'en')
                                    {{$counter[1]->counter_no}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    @php
                                        $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                        $counterData = $counter[1]->counter_no;
                                        $counterNoBengali = '';
                                        foreach (str_split($counterData) as $digit) {
                                            $counterNoBengali .= $bengaliNumerals[$digit];
                                        }
                                    @endphp
                                    {{$counterNoBengali}}
                                @endif
                            </h3>
                            <span>
                                @if (session('locale') == 'en')
                                    {{$counter[1]->counter_name}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$counter[1]->counter_name_bn}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="single-sdmga-counter-area">
                        <div class="sdmga-counter-icon">
                            <img src="{{ asset('frontend/assets/images/game.png') }}" alt="" loading="lazy">
                        </div>
                        <div class="sdmga-counter-content">
                            <h3 class="number">
                                @if (session('locale') == 'en')
                                    {{$counter[2]->counter_no}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    @php
                                        $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                        $counterData = $counter[2]->counter_no;
                                        $counterNoBengali = '';
                                        foreach (str_split($counterData) as $digit) {
                                            $counterNoBengali .= $bengaliNumerals[$digit];
                                        }
                                    @endphp
                                    {{$counterNoBengali}}
                                @endif
                            </h3>
                            <span>
                                @if (session('locale') == 'en')
                                    {{$counter[2]->counter_name}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$counter[2]->counter_name_bn}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="single-sdmga-counter-area">
                        <div class="sdmga-counter-icon">
                            <img src="{{ asset('frontend/assets/images/app.png') }}" alt="" loading="lazy">
                        </div>
                        <div class="sdmga-counter-content">
                            <h3 class="number">
                                @if (session('locale') == 'en')
                                    {{$counter[3]->counter_no}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    @php
                                        $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                        $counterData = $counter[3]->counter_no;
                                        $counterNoBengali = '';
                                        foreach (str_split($counterData) as $digit) {
                                            $counterNoBengali .= $bengaliNumerals[$digit];
                                        }
                                    @endphp
                                    {{$counterNoBengali}}
                                @endif
                            </h3>
                            <span>
                                @if (session('locale') == 'en')
                                    {{$counter[3]->counter_name}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$counter[3]->counter_name_bn}}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="single-sdmga-counter-area">
                        <div class="sdmga-counter-icon">
                            <img src="{{ asset('frontend/assets/images/animation.png') }}" alt="" loading="lazy">
                        </div>
                        <div class="sdmga-counter-content">
                            <h3 class="number">
                                @if (session('locale') == 'en')
                                    {{$counter[3]->counter_no}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    @php
                                        $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                        $counterData = $counter[3]->counter_no;
                                        $counterNoBengali = '';
                                        foreach (str_split($counterData) as $digit) {
                                            $counterNoBengali .= $bengaliNumerals[$digit];
                                        }
                                    @endphp
                                    {{$counterNoBengali}}
                                @endif
                            </h3>
                            <span>
                                @if (session('locale') == 'en')
                                    {{$counter[3]->counter_name}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$counter[3]->counter_name_bn}}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- ! Initiative Section Area -->
<section class="section">
    <div class="container">
        <div class="row section_heading">
            <div class="col-lg-7 text-center mx-auto">
                <h2 class="heading">
                    @if (session('locale') == 'en')
                        Initiatives
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        উদ্যোগ
                    @endif
                </h2>
            </div>
        </div>
		<div class="row g-4">
			<div class="col-md-4">
				<a href="#" class="initiative_wrap labs">
					<div class="image_area">
						<img src="{{ asset('frontend/assets/images/school.png') }}" alt="">
					</div>
					<h2>
                        @if (session('locale') == 'en')
                            Labs Setup
                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                            ল্যাব সেটআপ
                        @endif

                    </h2>
				</a>
				<a href="{{route('project.pages')}}" class="initiative_wrap apps">
					<div class="image_area">
						<img src="{{ asset('frontend/assets/images/app.png') }}" alt="">
					</div>
					<h2>
                        @if (session('locale') == 'en')
                            Apps
                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                            অ্যাপস
                        @endif
                    </h2>
				</a>
			</div>
			<div class="col-md-4">
				<a href="{{route('training.pages')}}" class="initiative_wrap traning">
					<div class="image_area">
						<img src="{{ asset('frontend/assets/images/traning.png') }}" alt="">
					</div>
					<h2>
                        @if (session('locale') == 'en')
                            Training
                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                            প্রশিক্ষণ
                        @endif
                    </h2>
				</a>
			</div>
			<div class="col-md-4">
				<a href="{{route('project.pages')}}" class="initiative_wrap games">
					<div class="image_area">
						<img src="{{ asset('frontend/assets/images/game.png') }}" alt="">
					</div>
					<h2>
                        @if (session('locale') == 'en')
                            Games
                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                            গেমস
                        @endif
                    </h2>
				</a>
				<a href="#" class="initiative_wrap animation">
					<div class="image_area">
						<img src="{{ asset('frontend/assets/images/animation.png') }}" alt="">
					</div>
					<h2>
                        @if (session('locale') == 'en')
                            Animation
                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                            অ্যানিমেশন
                        @endif
                    </h2>
				</a>
			</div>
		</div>
    </div>
</section>
<!-- ! Training Section Area -->
<section class="section">
    <div class="container">
        <div class="row section_heading">
            <div class="col-lg-7 text-center mx-auto">
                <h2 class="heading">
                    @if (session('locale') == 'en')
                        Training
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        প্রশিক্ষণ
                    @endif
                </h2>
            </div>
        </div>
        <div class="trainings_active">
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
        <div class="row">
            <div class="col-lg-12">
                <div class="browse_all text-center">
                    @if (session('locale') == 'en')
                        <a href="{{route('training.pages')}}" class="border_btn">More Trainings</a>
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        <a href="{{route('training.pages')}}" class="border_btn">আরো প্রশিক্ষণ</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ! Game And App Showcase Area -->
<section class="app_and_game_showcase">
    <div class="showcase_active">

          @foreach($showcase as $showcaseData)
            @if($showcaseData->background_image == null)
                <div class="showcase_slide" style="background-color: {{$showcaseData->background_color}};">
                    <div class="container">
                        <div class="row align-items-md-center">
                            <div class="col-12 col-md-5">
                                <div class="showcase_image text-center">
                                    <img draggable="false" class="img-fluid w-100" src="{{URL::to('images/showcase/cover/'. $showcaseData->image )}}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="showcase_caption">
                                    <h4>
                                        @if (session('locale') == 'en')
                                            {{$showcaseData->title}}
                                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            {{$showcaseData->title_bn}}
                                        @endif
                                    </h4>

                                    <h2>
                                        @if (session('locale') == 'en')
                                            {{$showcaseData->name}}
                                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            {{$showcaseData->name_bn}}
                                        @endif
                                    </h2>
                                    <p>
                                        @if (session('locale') == 'en')
                                            {!! Str::limit($showcaseData->details, 202) !!}
                                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            {!! Str::limit($showcaseData->details_bn, 202) !!}
                                        @endif
                                    </p>
                                    <div class="download_app d-flex align-items-center">
                                        <a href="{{$showcaseData->play_store_link}}" target="_blank">
                                            <img src="{{URL::to('frontend/assets/images/playstroe.png')}}" alt="">
                                        </a>
                                        <a href="{{$showcaseData->app_store_link}}" target="_blank">
                                            <img src="{{URL::to('frontend/assets/images/appstroe.png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="showcase_slide" style="background-image: url('{{URL::to('images/showcase/background/'.$showcaseData->background_image)}}');">
                    <div class="container">
                        <div class="row align-items-md-center">
                            <div class="col-12 col-md-5">
                                <div class="showcase_image text-center">
                                    <img draggable="false" class="img-fluid w-100" src="{{URL::to('images/showcase/cover/'. $showcaseData->image )}}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="showcase_caption">
                                    <h4>
                                        @if (session('locale') == 'en')
                                            {{$showcaseData->title}}
                                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            {{$showcaseData->title_bn}}
                                        @endif
                                    </h4>
                                    <h2>
                                        @if (session('locale') == 'en')
                                            {{$showcaseData->name}}
                                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            {{$showcaseData->name_bn}}
                                        @endif
                                    </h2>
                                    <p>
                                        @if (session('locale') == 'en')
                                            {!! Str::limit($showcaseData->details, 202) !!}
                                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            {!! Str::limit($showcaseData->details_bn, 202) !!}
                                        @endif
                                    </p>
                                    <div class="download_app d-flex align-items-center">
                                        <a href="{{$showcaseData->play_store_link}}" target="_blank">
                                            <img src="{{URL::to('frontend/assets/images/playstroe.png')}}" alt="">
                                        </a>
                                        <a href="{{$showcaseData->app_store_link}}" target="_blank">
                                            <img src="{{URL::to('frontend/assets/images/appstroe.png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
          @endforeach
    </div>
</section>



<!-- ! Animation Movie Area 1 -->
{{--<section class="section">--}}
{{--    <div class="container">--}}
{{--        <section class="slideshow">--}}
{{--            <div class="content">--}}
{{--                <div class="slider-content">--}}
{{--                    <figure class="shadow">--}}
{{--                        <img src="http://www.webdesigndev.com/wp-content/uploads/2015/07/The-Ice-cavern-by-refriedspinach.jpg">--}}
{{--                    </figure>--}}
{{--                    <figure class="shadow">--}}
{{--                        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/8dc4a523607575.55deba70e5e71.jpg">--}}
{{--                    </figure>--}}
{{--                    <figure class="shadow">--}}
{{--                        <img src="https://i.pinimg.com/originals/08/b2/0f/08b20f2d451fef77cebab0ae273dd283.jpg">--}}
{{--                    </figure>--}}
{{--                    <figure class="shadow">--}}
{{--                        <img src="http://www.webdesigndev.com/wp-content/uploads/2015/07/The-Ice-cavern-by-refriedspinach.jpg">--}}
{{--                    </figure>--}}
{{--                    <figure class="shadow">--}}
{{--                        <img src="https://cdn.wallpapersafari.com/86/48/wHpFRg.jpg">--}}
{{--                    </figure>--}}
{{--                    <figure class="shadow">--}}
{{--                        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/e2c7758404315.560bcaeb3ce4e.jpg">--}}
{{--                    </figure>--}}
{{--                    <figure class="shadow">--}}
{{--                        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/8dc4a523607575.55deba70e5e71.jpg">--}}
{{--                    </figure>--}}
{{--                    <figure class="shadow">--}}
{{--                        <img src="https://images.hdqwalls.com/wallpapers/bthumb/deer-polygon-art-8k-am.jpg">--}}
{{--                    </figure>--}}
{{--                    <figure class="shadow">--}}
{{--                        <img src="https://images.hdqwalls.com/wallpapers/bthumb/deer-polygon-art-8k-am.jpg">--}}
{{--                    </figure>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- ! Animation Movie Area 2-->
<section class="section">
    <div class="container card-deck-js">
        @foreach($ott as $ottData)
        <div class="stack_card" style="transform: translateY(0px);">
            <div class="animation_movie_stack_wrap">
                <a href="{{$ottData->link}}" target="_blank">
                    <img src="{{asset('images/ott/'. $ottData->image )}}" alt="">
                    <div class="content_stack">
                        <h2>
                            @if (session('locale') == 'en')
                                {{$ottData->title}}
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                {{$ottData->title_bn}}
                            @endif
                        </h2>

                        <p>
                            @if (session('locale') == 'en')
                                {!! Str::limit($ottData->details, 170) !!}
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                {!! Str::limit($ottData->details_bn, 170) !!}
                            @endif
                        </p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection


