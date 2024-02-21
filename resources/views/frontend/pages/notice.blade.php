@extends('frontend.index')
@section('home_content')
    <section class="slider-area">
        <div class="slider-height2 slider-bg6 hero-overly02 d-flex align-items-center" style="background-image: url({{asset($siteInfo->notice_banner )}})">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="hero-caption hero-caption2 text-center">
                            <h2>
                                @if (session('locale') == 'en')
                                    Notice
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    নোটিশ
                                @endif

                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ! Notice Board Section here -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="notice_wrap table-responsive">
                        <table class="table table-bordered w-100">
                            <thead>
                            <tr class="text-center">
                                <th>
                                    @if (session('locale') == 'en')
                                        Sl
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        ক্রমিক নং
                                    @endif
                                </th>
                                <th>
                                    @if (session('locale') == 'en')
                                        Title
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        শিরোনাম
                                    @endif
                                </th>

                                <th>
                                    @if (session('locale') == 'en')
                                        Date
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        তারিখ
                                    @endif
                                </th>
                                <th>
                                    @if (session('locale') == 'en')
                                        File
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        ফাইল
                                    @endif
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notice as $key => $noticeData)
                            <tr class="table_row">
                                <td class="text-center">
                                    @if (session('locale') == 'en')
                                        {{ $key+1 }}
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            <?php
                                            $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                            $number = $key + 1;
                                            $bengaliNumber = '';

                                            $number = (string) $number;
                                            $length = strlen($number);

                                            for ($i = 0; $i < $length; $i++) {
                                                $digit = intval($number[$i]);
                                                $bengaliNumber .= isset($bengaliNumerals[$digit]) ? $bengaliNumerals[$digit] : $number[$i];
                                            }
                                            ?>
                                        {{ $bengaliNumber }}
                                    @endif
                                </td>

                                <td>
                                    @if (session('locale') == 'en')
                                       {{$noticeData->title_en}}
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        {{$noticeData->title}}
                                    @endif
                                </td>


                                <td class="text-center">
                                    @if (session('locale') == 'en')
                                        {{ \Carbon\Carbon::parse($noticeData->published_date)->format('d M Y') }}
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            <?php
                                            $bengaliNumerals = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                                            $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                            $bengaliMonths = ['জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর'];

                                            $day = \Carbon\Carbon::parse($noticeData->published_date)->format('d');
                                            $monthIndex = \Carbon\Carbon::parse($noticeData->published_date)->format('n') - 1;
                                            $year = \Carbon\Carbon::parse($noticeData->published_date)->format('Y');

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
                                </td>

                                <td class="text-center">
                                    <a href="{{ asset('/images/notice/' . $noticeData->pdf_file) }}" target="_blank">Download</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class='d-felx justify-content-center'>
                            <div class="d-felx justify-content-center">
                                {{$notice->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
