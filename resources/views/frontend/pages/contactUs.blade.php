@extends('frontend.index')
@section('home_content')

    <section class="slider-area">
        <div class="slider-height2 slider-bg6 hero-overly02 d-flex align-items-center" style="background-image: url({{asset($siteSetting->contact_banner )}})">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="hero-caption hero-caption2 text-center">
                            <h2>
                                @if (session('locale') == 'en')
                                    Contact us
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    যোগাযোগ
                                @endif
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ! Contact Section Area -->
    <section class="section contact_us_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact--info-area">
                        <h3>

                            @if (session('locale') == 'en')
                                Get in touch
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                যোগাযোগ করুন
                            @endif
                        </h3>
                        <p>
                            @if (session('locale') == 'en')
                                Looking for help ? Fill the form.
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                সাহায্য খুঁজছেন? ফর্ম পূরণ করুন।
                            @endif

                        </p>
                        <div class="single-info">
                            <h5>
                                @if (session('locale') == 'en')
                                    Headquarters
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    সদর দপ্তর
                                @endif
                            </h5>
                            <p>
                                <i class="fa fa-home"></i>
                                @if (session('locale') == 'en')
                                    {{$siteSetting->address}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$siteSetting->address_bn}}
                                @endif

                            </p>
                        </div>
                        <div class="single-info">
                            <h5>
                                @if (session('locale') == 'en')
                                    Phone
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    ফোন
                                @endif
                            </h5>
                            <p>
                                <i class="fa fa-phone"></i>
                                @if (session('locale') == 'en')
                                    +88{{$siteSetting->phone}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    @php
                                        $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                        $numberData = $siteSetting->phone;
                                        $counterNoBengali = '';
                                        foreach (str_split($numberData) as $digit) {
                                            $counterNoBengali .= $bengaliNumerals[$digit];
                                        }
                                    @endphp
                                    +৮৮{{$counterNoBengali}}
                                @endif
                               <br>

                            </p>
                        </div>
                        <div class="single-info">
                            <h5>
                                @if (session('locale') == 'en')
                                    Support
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    সমর্থন
                                @endif
                            </h5>
                            <p>
                                <i class="fa fa-envelope"></i>
                                {{$siteSetting->email}}<br>
                            </p>
                        </div>
                        <div class="ab-social">
                            <h5>

                                @if (session('locale') == 'en')
                                    Follow Us
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    অনুসরণ করুন
                                @endif
                            </h5>
                            <a class="fac" href="{{$siteSetting->facebook_link}}"><i class="fab fa-facebook-f"></i></a>
                            <a class="twi" href="{{$siteSetting->twitter_link}}"><i class="fab fa-twitter"></i></a>
                            <a class="you" href="{{$siteSetting->youtube_link}}"><i class="fab fa-youtube"></i></a>
                            <a class="lin" href="{{$siteSetting->linkedin_link}}"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="contact-form">
                        <h4>
                            @if (session('locale') == 'en')
                                Let’s Connect
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                সমর্থন
                            @endif
                        </h4>
                        <form action="{{route('send.message')}}" method="post" class="row">
                            @csrf
                            <div class="col-md-12">
                                <input type="text" name="name" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Email Address" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" placeholder="Phone Number" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="col-md-12">
                                <textarea name="details" placeholder="How can we help?"></textarea>
                            </div>
                            <div class="col-md-6">
{{--                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITEKEY') }}"></div>--}}
                            </div>
                            <div class="col-md-6 text-end">
                                <input type="submit" name="submit" value="{{session('locale') == 'en'? "Send Message":"বার্তা পাঠান"}}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ! SDMG Google Maps Section Area -->
    <div class="sdmga-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.1203431615395!2d90.37189267570668!3d23.778728578651144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0b3340c1c91%3A0xfec009b60808d80a!2sICT%20Tower!5e0!3m2!1sen!2sbd!4v1706078727521!5m2!1sen!2sbd"></iframe>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endsection
