<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('front/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="/{{ asset('front/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/img/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('front/img/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('front/img/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ asset('front/libs/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.min.css') }}">

    <meta name="description"
          content="Главные новости дня из Ташкента и областей Узбекистана, информационная лента новостей, новости Узбекистана и мира.">
    <meta name="keywords"
          content="новости Узбекистана, узбекские новости, события в Ташкенте, события в Узбекистане, спортивные новости, автоновости, новости технологий, кино рецензии">
    <meta property="og:title"
          content="Solanews.uz — Новости сегодня: самые свежие и последние новости Узбекистана и мира.">
    <meta property="og:description"
          content="Главные новости дня из Ташкента и областей Узбекистана, информационная лента новостей, новости Узбекистана и мира.">
    <meta property="og:url" content="https://solanews.uz">
    <meta property="og:site_name"
          content="Solanews.uz — Новости сегодня: самые свежие и последние новости Узбекистана и мира."/>

    <style>
        .lds-ellipsis {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }

        .lds-ellipsis div {
            position: absolute;
            top: 33px;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: #00d502;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }

        .lds-ellipsis div:nth-child(1) {
            left: 8px;
            animation: lds-ellipsis1 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(2) {
            left: 8px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(3) {
            left: 32px;
            animation: lds-ellipsis2 0.6s infinite;
        }

        .lds-ellipsis div:nth-child(4) {
            left: 56px;
            animation: lds-ellipsis3 0.6s infinite;
        }

        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }

        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(0);
            }
        }

        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(24px, 0);
            }
        }

    </style>
</head>

<body>
<!-- Header -->
<header>
    <div class="navbar navbar-expand-lg bsnav bsnav-sticky bsnav-sticky-slide">
        <div class="container position-relative">

            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset('front/img/logo.png') }}" alt="Logo">
            </a>

            <button class="navbar-toggler toggler-spin">
                <span class="navbar-toggler-icon"></span>
            </button>
            @php $locale = session()->get('locale'); @endphp
            <div class="collapse navbar-collapse ml-5">
                <ul class="navbar-nav navbar-mobile">
                    <li class="nav-item">
                        <div class="lang lang-mobile d-lg-none d-flex">
                            <a @if($locale == 'ru') class="active" @endif href="{{ route('lang', 'ru') }}">РУ</a>
                            <a @if($locale == 'kr') class="active" @endif href="{{ route('lang', 'kr') }}">ЎЗ</a>
                            <a @if($locale == 'uz') class="active" @endif href="{{ route('lang', 'uz') }}">O'z</a>
                        </div>
                    </li>
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category', $category->slug) }}">
                                @if(session()->get('locale') === 'uz')
                                    {{ $category->title['uz'] }}
                                @elseif(session()->get('locale') === 'kr')
                                    {{ $category->title['kr'] }}
                                @elseif(session()->get('locale') === 'ru')
                                    {{ $category->title['ru'] }}
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="searching">
                <a href="javascript:void(0)" data-target="#modal_search" data-toggle="modal" title="Qidirish">
                    <i class="fal fa-search"></i>
                </a>
            </div>
            <div class="lang d-lg-flex d-none">
                <a @if($locale == 'ru') class="active" @endif href="{{ route('lang', 'ru') }}">РУ</a>
                <a @if($locale == 'kr') class="active" @endif href="{{ route('lang', 'kr') }}">ЎЗ</a>
                <a @if($locale == 'uz') class="active" @endif href="{{ route('lang', 'uz') }}">O'z</a>
            </div>
        </div>
    </div>

    <div class="bsnav-mobile">
        <div class="bsnav-mobile-overlay"></div>
        <div class="navbar"></div>
    </div>

    <div class="banner border-top border-bottom">
        <div class="container">
            <div class="date">
                <div>
    <span class="d-lg-inline-block d-block">
        {{ date('j F l') }}
    </span>
                </div>
            </div>
            <div class="currency">
                <div>
                    <a href="https://solanews.uz/ru/currency">
                        <span class="d-lg-inline-block d-block">1 USD = 10485.66</span>
                        <span class="d-lg-inline-block d-none"> | </span>
                        <span class="d-lg-inline-block d-block">1 EUR = 12298.63</span>
                    </a>
                </div>

            </div>
            <div class="weather">
                <?php
                $apiKey = "7b1fa84582ef855b27a0d876415133be";
                $cityId = "1512569";
                $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);

                curl_close($ch);
                $data = json_decode($response);
                $currentTime = time();
                ?>
                <div>
                    <a href="https://solanews.uz/uz/weather">
                        <div class="weather__content">
                            <div class="weather__icon">
                                <div class="weather-forecast">
                                    <img
                                        src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                                        class="weather-icon" />
                                </div>
                            </div>

                            <div class="weather__count">
                                <?php echo $data->main->temp ?>
                                <sup><i class="far fa-circle"></i></sup>
                            </div>

                            <div class="weather__region">
                                <?php echo $data->name; ?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container rek-container">
        <div class="rek">
            <div class="rek__big d-none d-md-block">
                <!-- Yandex.RTB R-A-583185-1 -->
                <div id="yandex_rtb_R-A-583185-1"></div>
{{--                <script type="text/javascript">--}}
{{--                    (function (w, d, n, s, t) {--}}
{{--                        w[n] = w[n] || [];--}}
{{--                        w[n].push(function () {--}}
{{--                            Ya.Context.AdvManager.render({--}}
{{--                                blockId: "R-A-583185-1",--}}
{{--                                renderTo: "yandex_rtb_R-A-583185-1",--}}
{{--                                async: true--}}
{{--                            });--}}
{{--                        });--}}
{{--                        t = d.getElementsByTagName("script")[0];--}}
{{--                        s = d.createElement("script");--}}
{{--                        s.type = "text/javascript";--}}
{{--                        s.src = "//an.yandex.ru/system/context.js";--}}
{{--                        s.async = true;--}}
{{--                        t.parentNode.insertBefore(s, t);--}}
{{--                    })(this, this.document, "yandexContextAsyncCallbacks");--}}
{{--                </script>--}}
            </div>
        </div>
    </div>


</header>

@if(session()->has('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session()->get('warning') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('danger') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@yield('content')

<!-- Footer -->
<footer class="footer">
    <div class="footer__links">
        <div class="container">
            <ul>
                @foreach($categories as $category)
                    @if($loop->index == 3)
                        @break
                    @endif
                    <li>
                        <a href="{{ route('category', $category->slug) }}">
                            @if(session()->get('locale') === 'uz')
                                {{ $category->title['uz'] }}
                            @elseif(session()->get('locale') === 'kr')
                                {{ $category->title['kr'] }}
                            @elseif(session()->get('locale') === 'ru')
                                {{ $category->title['ru'] }}
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul>
                @foreach($categories as $category)
                    @if($loop->index < 3)
                        @continue
                    @endif
                    @if($loop->index == 6)
                        @break
                    @endif
                    <li>
                        <a href="{{ route('category', $category->slug) }}">
                            @if(session()->get('locale') === 'uz')
                                {{ $category->title['uz'] }}
                            @elseif(session()->get('locale') === 'kr')
                                {{ $category->title['kr'] }}
                            @elseif(session()->get('locale') === 'ru')
                                {{ $category->title['ru'] }}
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul>
                @foreach($categories as $category)
                    @if($loop->index < 6)
                        @continue
                    @endif
                    @if($loop->index == 9)
                        @break
                    @endif
                    <li>
                        <a href="{{ route('category', $category->slug) }}">
                            @if(session()->get('locale') === 'uz')
                                {{ $category->title['uz'] }}
                            @elseif(session()->get('locale') === 'kr')
                                {{ $category->title['kr'] }}
                            @elseif(session()->get('locale') === 'ru')
                                {{ $category->title['ru'] }}
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>

            <ul>
                <li><a href="{{ route('ads') }}">@lang("ads")</a></li>

                <li><a href="{{ route('policy') }}">@lang('policy')</a>
                </li>
            </ul>
            <ul>

                <li><a href="{{ route('contacts') }}">@lang("contacts")</a></li>

            </ul>

            <ul>
                <li>
                    <a href="https://www.facebook.com/solanewsuz" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-3" href="https://www.instagram.com/solanews.uz/" target="_blank"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://t.me/solanewsuz" target="_blank"><i class="fab fa-telegram-plane"></i></a>
                </li>

            </ul>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="copyright">
            <span>Sola News © 2021. @lang("rights")</span>
            <span class="d-md-inline-block d-none">|</span>
            <span>@lang("design") <a href="https://usoft.uz">Usoft</a></span>
        </div>
    </div>
</footer>

<!-- Modal Search -->
<div class="modal fade" id="modal_search">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">
                    <i class="fal fa-times"></i>
                </button>
                <form class="form-search" action="https://solanews.uz/ru/posts/search" method="get">
                    <input type="text" name="search" placeholder="Поиск...">
                    <button type="submit" class="my-btn--search">
                        <i class="fal fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">
    <i class="fal fa-arrow-up"></i>
</button>

<script src="{{ asset('front/js/main.min.js') }}"></script>
@yield('java')

</body>

</html>
