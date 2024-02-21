<!DOCTYPE html>
<html lang="en">
@php
    $siteSetting = DB::table('site_settings')->first();
@endphp

@php
    $menus = DB::table('menus')->get();
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$siteSetting->title}}</title>
    <link rel="shortcut icon" href="{{$siteSetting->favicon}}">
    <meta property="og:image" content="{{$siteSetting->site_preview_image}}"/>
    <meta property="og:site_name" content="{{$siteSetting->name}}"/>
    <meta property="og:description" content="{{$siteSetting->meta_description}}"/>
    <!-- ! Font Awesome -->
    <script src="{{asset('frontend/assets/plugin/fontawesome/fontAwesome.js')}}"></script>
    <!-- ! Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/plugin/bootstrap/bootstrap.min.css')}}">
    <!-- ! Flaticon -->
    <link rel="stylesheet" href="{{asset('frontend/assets/plugin/flaticon/flaticon.css')}}">
    <!-- ! Themify Icons -->
    <link rel="stylesheet" href="{{asset('frontend/assets/plugin/themify-icons/themify-icons.css')}}">
    <!-- ! Slick Slider -->
    <link rel="stylesheet" href="{{asset('frontend/assets/plugin/slick-slider/slick.css')}}">
    <!-- ! Animate Css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/plugin/animate/animate.min.css')}}">
	<script src="https://kit.fontawesome.com/6d4a24a985.js" crossorigin="anonymous"></script>
    <!-- ! Main Css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <!-- ! Responsive Css -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">

    <!-- ! Components -->
    <script src="{{asset('frontend/assets/components/header.js')}}"></script>
    <script src="{{asset('frontend/assets/components/backToTop.js')}}"></script>
</head>
<body>
<!-- ! Header Section and Offcanvas Menu Area -->
<header class="navbar_area header_sticky">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img height="60" draggable="false" src="{{URL::to('frontend/assets/images/sdmg.png')}}" alt="">
                </a>
                <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.5 10.5H1.5C0.671578 10.5 0 11.1716 0 12C0 12.8284 0.671578 13.5 1.5 13.5H22.5C23.3284 13.5 24 12.8284 24 12C24 11.1716 23.3284 10.5 22.5 10.5Z" fill="currentColor"/>
                        <path d="M1.5 6.50001H22.5C23.3284 6.50001 24 5.82843 24 5C24 4.17158 23.3284 3.5 22.5 3.5H1.5C0.671578 3.5 0 4.17158 0 5C0 5.82843 0.671578 6.50001 1.5 6.50001Z" fill="currentColor"/>
                        <path d="M22.5 17.5H1.5C0.671578 17.5 0 18.1716 0 19C0 19.8284 0.671578 20.5 1.5 20.5H22.5C23.3284 20.5 24 19.8284 24 19C24 18.1716 23.3284 17.5 22.5 17.5Z" fill="currentColor"/>
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 index-menu-list">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="nav-link" href="/">
                                @if (session('locale') == 'en')
                                    {{$menus[0]->name_en}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$menus[0]->name_bn}}
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about.pages')}}">
                                @if (session('locale') == 'en')
                                    {{$menus[1]->name_en}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$menus[1]->name_bn}}
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('team.pages')}}">
                                @if (session('locale') == 'en')
                                    {{$menus[7]->name_en}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$menus[7]->name_bn}}
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('notice.pages')}}">
                                @if (session('locale') == 'en')
                                    {{$menus[2]->name_en}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$menus[2]->name_bn}}
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('news.pages')}}">
                                @if (session('locale') == 'en')
                                    {{$menus[3]->name_en}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$menus[3]->name_bn}}
                                @endif
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @if (session('locale') == 'en')
                                    {{$menus[4]->name_en}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$menus[4]->name_bn}}
                                @endif
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{route('project.pages')}}">
                                        @if (session('locale') == 'en')
                                            {{$menus[5]->name_en}}
                                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                            {{$menus[5]->name_bn}}
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('contact.pages')}}">
                                @if (session('locale') == 'en')
                                    {{$menus[6]->name_en}}
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                    {{$menus[6]->name_bn}}
                                @endif
                            </a>
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 0.875C6.66576 0.875 6.82473 0.940848 6.94194 1.05806C7.05915 1.17527 7.125 1.33424 7.125 1.5V2.755C8.61366 2.77743 10.1 2.88064 11.5775 3.06417C11.659 3.07434 11.7376 3.10047 11.809 3.14105C11.8804 3.18163 11.9431 3.23588 11.9935 3.30068C12.0439 3.36549 12.0811 3.43959 12.1028 3.51876C12.1246 3.59793 12.1306 3.68061 12.1204 3.76208C12.1102 3.84356 12.0841 3.92223 12.0435 3.99361C12.0029 4.06498 11.9487 4.12767 11.8839 4.17808C11.8191 4.2285 11.745 4.26566 11.6658 4.28743C11.5867 4.30921 11.504 4.31518 11.4225 4.305C10.8725 4.23583 10.32 4.17917 9.76416 4.13333C9.27829 6.02974 8.43888 7.81741 7.29 9.4025C7.55416 9.7225 7.83166 10.03 8.12166 10.325C8.17923 10.3835 8.22469 10.4529 8.25547 10.529C8.28625 10.6051 8.30173 10.6865 8.30103 10.7686C8.30033 10.8507 8.28347 10.9319 8.25141 11.0075C8.21935 11.0831 8.17271 11.1516 8.11416 11.2092C8.05562 11.2667 7.9863 11.3122 7.91018 11.343C7.83406 11.3737 7.75263 11.3892 7.67053 11.3885C7.58842 11.3878 7.50726 11.371 7.43168 11.3389C7.35609 11.3069 7.28756 11.2602 7.23 11.2017C6.97764 10.9448 6.73416 10.6794 6.5 10.4058C5.18448 11.9432 3.58396 13.2115 1.78666 14.1408C1.71372 14.1785 1.63409 14.2014 1.55229 14.2083C1.4705 14.2151 1.38816 14.2058 1.30996 14.1809C1.23177 14.1559 1.15925 14.1158 1.09656 14.0628C1.03387 14.0098 0.982225 13.945 0.94458 13.8721C0.906934 13.7991 0.884024 13.7195 0.877156 13.6377C0.870288 13.5559 0.879598 13.4736 0.904554 13.3954C0.929509 13.3172 0.969622 13.2447 1.0226 13.182C1.07558 13.1193 1.14039 13.0676 1.21333 13.03C2.94134 12.1362 4.47086 10.9023 5.71 9.4025C4.98297 8.39873 4.37815 7.3119 3.90833 6.165C3.84926 6.01235 3.85244 5.84262 3.91717 5.69229C3.9819 5.54195 4.10302 5.42301 4.2545 5.36102C4.40599 5.29902 4.57575 5.29893 4.7273 5.36076C4.87885 5.42259 5.0001 5.5414 5.065 5.69167C5.4482 6.62698 5.92921 7.51916 6.5 8.35333C7.39899 7.03945 8.0724 5.58474 8.4925 4.04917C6.18443 3.93469 3.87079 4.02029 1.5775 4.305C1.41295 4.32555 1.24698 4.2799 1.1161 4.17808C0.985212 4.07627 0.900134 3.92663 0.87958 3.76208C0.859026 3.59754 0.904678 3.43157 1.00649 3.30068C1.10831 3.1698 1.25795 3.08472 1.4225 3.06417C2.89994 2.88028 4.38631 2.77707 5.875 2.755V1.5C5.875 1.33424 5.94085 1.17527 6.05805 1.05806C6.17527 0.940848 6.33424 0.875 6.5 0.875ZM12.125 6.5C12.244 6.49995 12.3605 6.53389 12.4609 6.59781C12.5613 6.66173 12.6414 6.75298 12.6917 6.86083L17.0667 16.2358C17.1014 16.3102 17.121 16.3908 17.1246 16.4728C17.1282 16.5548 17.1156 16.6367 17.0875 16.7139C17.0594 16.791 17.0164 16.8619 16.9609 16.9224C16.9054 16.983 16.8386 17.032 16.7642 17.0667C16.6139 17.1367 16.4419 17.1442 16.2861 17.0875C16.1303 17.0308 16.0034 16.9145 15.9333 16.7642L14.935 14.625H9.315L8.31666 16.7642C8.2466 16.9145 8.11971 17.0308 7.9639 17.0875C7.80808 17.1442 7.63612 17.1367 7.48583 17.0667C7.33554 16.9966 7.21924 16.8697 7.16251 16.7139C7.10578 16.5581 7.11327 16.3861 7.18333 16.2358L11.5583 6.86083C11.6086 6.75298 11.6887 6.66173 11.7891 6.59781C11.8894 6.53389 12.006 6.49995 12.125 6.5ZM9.89833 13.375H14.3517L12.125 8.60333L9.89833 13.375Z" fill="currentColor"/>
								</svg>
                                @if (session('locale') == 'en')
                                    English
                                @elseif (session('locale') == 'bn' || !session()->has('locale'))
									বাংলা
                                @endif
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    @if (session('locale') == 'en')
                                        <a class="nav-link" href="{{ route('change.language', 'bn') }}"> বাংলা</a>
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        <a class="nav-link" href="{{ route('change.language', 'en') }}">English</a>
                                    @endif
                                </li>
                            </ul>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            @if (session('locale') == 'en')--}}
{{--                                <a class="nav-link" href="{{ route('change.language', 'bn') }}"> বাংলা</a>--}}
{{--                            @elseif (session('locale') == 'bn' || !session()->has('locale'))--}}
{{--                                <a class="nav-link" href="{{ route('change.language', 'en') }}">English</a>--}}
{{--                            @endif--}}
{{--                        </li>--}}



                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="visibility: hidden;" aria-hidden="true">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            <a class="navbar-brand" href="/">
                <img height="60" draggable="false" src="{{URL::to('frontend/assets/images/sdmg.png')}}" alt="">
            </a>
        </h5>
        <button class="button_close" data-bs-dismiss="offcanvas" aria-label="Close">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_405_1736)">
                    <path d="M14.1211 12.0002L23.5608 2.56161C24.1467 1.97565 24.1467 1.02563 23.5608 0.439714C22.9748 -0.146246 22.0248 -0.146246 21.4389 0.439714L12.0002 9.8793L2.56161 0.439714C1.97565 -0.146246 1.02563 -0.146246 0.439714 0.439714C-0.146199 1.02567 -0.146246 1.9757 0.439714 2.56161L9.8793 12.0002L0.439714 21.4389C-0.146246 22.0248 -0.146246 22.9748 0.439714 23.5608C1.02567 24.1467 1.9757 24.1467 2.56161 23.5608L12.0002 14.1211L21.4388 23.5608C22.0248 24.1467 22.9748 24.1467 23.5607 23.5608C24.1467 22.9748 24.1467 22.0248 23.5607 21.4389L14.1211 12.0002Z" fill="currentColor"/>
                </g>
                <defs>
                    <clipPath id="clip0_405_1736">
                        <rect width="24" height="24" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
        </button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column faqMenu_color offcanvas-menu-list">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">
                    @if (session('locale') == 'en')
                        {{$menus[0]->name_en}}
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        {{$menus[0]->name_bn}}
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('about.pages')}}">
                    @if (session('locale') == 'en')
                        {{$menus[1]->name_en}}
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        {{$menus[1]->name_bn}}
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('team.pages')}}">
                    @if (session('locale') == 'en')
                        {{$menus[7]->name_en}}
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        {{$menus[7]->name_bn}}
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('notice.pages')}}">
                    @if (session('locale') == 'en')
                        {{$menus[2]->name_en}}
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        {{$menus[2]->name_bn}}
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('news.pages')}}">
                    @if (session('locale') == 'en')
                        {{$menus[3]->name_en}}
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        {{$menus[3]->name_bn}}
                    @endif
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (session('locale') == 'en')
                        {{$menus[4]->name_en}}
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        {{$menus[4]->name_bn}}
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{route('project.pages')}}">
                            @if (session('locale') == 'en')
                                {{$menus[5]->name_en}}
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                {{$menus[5]->name_bn}}
                            @endif
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('contact.pages')}}">
                    @if (session('locale') == 'en')
                        {{$menus[6]->name_en}}
                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                        {{$menus[6]->name_bn}}
                    @endif
                </a>
            </li>

{{--            <li class="nav-item">--}}
{{--                @if (session('locale') == 'en')--}}
{{--                    <a class="nav-link" href="{{ route('change.language', 'bn') }}"> বাংলা</a>--}}
{{--                @elseif (session('locale') == 'bn' || !session()->has('locale'))--}}
{{--                    <a class="nav-link" href="{{ route('change.language', 'en') }}">English</a>--}}
{{--                @endif--}}
{{--            </li>--}}

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 0.875C6.66576 0.875 6.82473 0.940848 6.94194 1.05806C7.05915 1.17527 7.125 1.33424 7.125 1.5V2.755C8.61366 2.77743 10.1 2.88064 11.5775 3.06417C11.659 3.07434 11.7376 3.10047 11.809 3.14105C11.8804 3.18163 11.9431 3.23588 11.9935 3.30068C12.0439 3.36549 12.0811 3.43959 12.1028 3.51876C12.1246 3.59793 12.1306 3.68061 12.1204 3.76208C12.1102 3.84356 12.0841 3.92223 12.0435 3.99361C12.0029 4.06498 11.9487 4.12767 11.8839 4.17808C11.8191 4.2285 11.745 4.26566 11.6658 4.28743C11.5867 4.30921 11.504 4.31518 11.4225 4.305C10.8725 4.23583 10.32 4.17917 9.76416 4.13333C9.27829 6.02974 8.43888 7.81741 7.29 9.4025C7.55416 9.7225 7.83166 10.03 8.12166 10.325C8.17923 10.3835 8.22469 10.4529 8.25547 10.529C8.28625 10.6051 8.30173 10.6865 8.30103 10.7686C8.30033 10.8507 8.28347 10.9319 8.25141 11.0075C8.21935 11.0831 8.17271 11.1516 8.11416 11.2092C8.05562 11.2667 7.9863 11.3122 7.91018 11.343C7.83406 11.3737 7.75263 11.3892 7.67053 11.3885C7.58842 11.3878 7.50726 11.371 7.43168 11.3389C7.35609 11.3069 7.28756 11.2602 7.23 11.2017C6.97764 10.9448 6.73416 10.6794 6.5 10.4058C5.18448 11.9432 3.58396 13.2115 1.78666 14.1408C1.71372 14.1785 1.63409 14.2014 1.55229 14.2083C1.4705 14.2151 1.38816 14.2058 1.30996 14.1809C1.23177 14.1559 1.15925 14.1158 1.09656 14.0628C1.03387 14.0098 0.982225 13.945 0.94458 13.8721C0.906934 13.7991 0.884024 13.7195 0.877156 13.6377C0.870288 13.5559 0.879598 13.4736 0.904554 13.3954C0.929509 13.3172 0.969622 13.2447 1.0226 13.182C1.07558 13.1193 1.14039 13.0676 1.21333 13.03C2.94134 12.1362 4.47086 10.9023 5.71 9.4025C4.98297 8.39873 4.37815 7.3119 3.90833 6.165C3.84926 6.01235 3.85244 5.84262 3.91717 5.69229C3.9819 5.54195 4.10302 5.42301 4.2545 5.36102C4.40599 5.29902 4.57575 5.29893 4.7273 5.36076C4.87885 5.42259 5.0001 5.5414 5.065 5.69167C5.4482 6.62698 5.92921 7.51916 6.5 8.35333C7.39899 7.03945 8.0724 5.58474 8.4925 4.04917C6.18443 3.93469 3.87079 4.02029 1.5775 4.305C1.41295 4.32555 1.24698 4.2799 1.1161 4.17808C0.985212 4.07627 0.900134 3.92663 0.87958 3.76208C0.859026 3.59754 0.904678 3.43157 1.00649 3.30068C1.10831 3.1698 1.25795 3.08472 1.4225 3.06417C2.89994 2.88028 4.38631 2.77707 5.875 2.755V1.5C5.875 1.33424 5.94085 1.17527 6.05805 1.05806C6.17527 0.940848 6.33424 0.875 6.5 0.875ZM12.125 6.5C12.244 6.49995 12.3605 6.53389 12.4609 6.59781C12.5613 6.66173 12.6414 6.75298 12.6917 6.86083L17.0667 16.2358C17.1014 16.3102 17.121 16.3908 17.1246 16.4728C17.1282 16.5548 17.1156 16.6367 17.0875 16.7139C17.0594 16.791 17.0164 16.8619 16.9609 16.9224C16.9054 16.983 16.8386 17.032 16.7642 17.0667C16.6139 17.1367 16.4419 17.1442 16.2861 17.0875C16.1303 17.0308 16.0034 16.9145 15.9333 16.7642L14.935 14.625H9.315L8.31666 16.7642C8.2466 16.9145 8.11971 17.0308 7.9639 17.0875C7.80808 17.1442 7.63612 17.1367 7.48583 17.0667C7.33554 16.9966 7.21924 16.8697 7.16251 16.7139C7.10578 16.5581 7.11327 16.3861 7.18333 16.2358L11.5583 6.86083C11.6086 6.75298 11.6887 6.66173 11.7891 6.59781C11.8894 6.53389 12.006 6.49995 12.125 6.5ZM9.89833 13.375H14.3517L12.125 8.60333L9.89833 13.375Z" fill="currentColor"/>
					</svg>
					@if (session('locale') == 'en')
						English
					@elseif (session('locale') == 'bn' || !session()->has('locale'))
						বাংলা
					@endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        @if (session('locale') == 'en')
                            <a class="nav-link" href="{{ route('change.language', 'bn') }}"> বাংলা</a>
                        @elseif (session('locale') == 'bn' || !session()->has('locale'))
                            <a class="nav-link" href="{{ route('change.language', 'en') }}">English</a>
                        @endif
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</div>
<main>
    @yield('home_content')
</main>

<div id="back_top" style="display: none;">
    <a title="Go to Top" href="#">
        <i class="fas fa-level-up-alt"></i>
    </a>
</div>
@php
$siteSetting = DB::table('site_settings')->first();
@endphp
<footer class="wrapper footer-wrapper">
    <div class="triangle-2"></div>
    <div class="triangle-1"></div>
    <div class="footer-top-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <a href="/">
							<img height="60" draggable="false" class="mb-3" src="{{URL::to('frontend/assets/images/sdmg.png')}}" alt="">
						</a>
                        <ul>
                            <li>
                                <a href="#">
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

                                </a>
                            </li>
                            <li><a href="#">{{$siteSetting->email}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h2>
                            @if (session('locale') == 'en')
                                Link
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                লিঙ্ক
                            @endif

                        </h2>
                        <ul>
                            <li>
                                <a href="{{$siteSetting->facebook_link}}">
                                    @if (session('locale') == 'en')
                                        Facebook
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        ফেসবুক
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a href="{{$siteSetting->twitter_link}}">
                                    @if (session('locale') == 'en')
                                        Twitter
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        টুইটার
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a href="{{$siteSetting->linkedin_link}}">
                                    @if (session('locale') == 'en')
                                        Linkedin
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        লিংকডইন
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a href="{{$siteSetting->youtube_link}}">
                                    @if (session('locale') == 'en')
                                        Youtube
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        ইউটিউব
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h2>
                            @if (session('locale') == 'en')
                                Important Links
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
								গুরুত্বপূর্ণ লিঙ্ক
                            @endif
                        </h2>
                        <ul>
                            <li>
                                <a href="https://ictd.gov.bd/">
                                    @if (session('locale') == 'en')
                                        ICT division
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        তথ্য ও যোগাযোগ প্রযুক্তি বিভাগ
                                    @endif

                                </a>
                            </li>
                            <li>
                                <a href="{{route('notice.pages')}}">
                                    @if (session('locale') == 'en')
                                        Notice
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        নোটিশ
                                    @endif

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h2>
                            @if (session('locale') == 'en')
                                Address
                            @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                ঠিকানা
                            @endif
                        </h2>
                        <ul>
                            <li>
                                <a href="#">
                                    @if (session('locale') == 'en')
                                        {{$siteSetting->address}}
                                    @elseif (session('locale') == 'bn' || !session()->has('locale'))
                                        {{$siteSetting->address_bn}}
                                    @endif

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ! Jquery -->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<!-- ! Bootstrap JS -->
<script src="{{asset('frontend/assets/plugin/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- ! Slick Slider -->
<script src="{{asset('frontend/assets/plugin/slick-slider/slick.min.js')}}"></script>
<!-- ! Custom JavaScript File -->
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>
</html>
