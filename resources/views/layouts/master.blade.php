<!doctype html>
<html lang="ru">
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

    <script data-ad-client="ca-pub-3471883509518767" async
            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script src="https://cdn.gravitec.net/storage/e5d7a4b44a86092fb3800c03ef0426d4/client.js" async></script>
    <script src="https://yastatic.net/pcode/adfox/loader.js" crossorigin="anonymous"></script>
    <!-- SAPE RTB JS -->
    <script
        async="async"
        src="//cdn-rtb.sape.ru/rtb-b/js/929/2/115929.js"
        type="text/javascript">
    </script>
    <!-- SAPE RTB END -->
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

            <div class="collapse navbar-collapse ml-5">
                <ul class="navbar-nav navbar-mobile">
                    <li class="nav-item">
                        <div class="lang lang-mobile d-lg-none d-flex">
                            <a class="active" href="/ru">РУ</a>
                            <a href="/kr">ЎЗ</a>
                            <a href="/uz">O'z</a>
                        </div>
                    </li>
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category', $category->slug) }}">
                                {{ $category->title }}
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
                <a class="active" href="/ru">РУ</a>
                <a href="/kr">ЎЗ</a>
                <a href="/uz">O'z</a>
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
                <div>
                    <a href="https://solanews.uz/ru/weather">
                        <div class="weather__content">
                            <div class="weather__icon">

                                <!-- <i class="fal fa-thunderstorm"></i> -->
                                <!-- <i class="fal fa-smog"></i> -->
                                <!-- <i class="fal fa-wind"></i> -->
                                <!-- <i class="fal fa-sun-cloud"></i> -->
                                <!-- <i class="fal fa-clouds"></i> -->
                                <!-- <i class="fal fa-fog"></i> -->
                                <!-- <i class="fal fa-thunderstorm-sun"></i> -->
                                <!-- <i class="fal fa-thunderstorm-moon"></i> -->
                                <i class="fal fa-moon"></i>
                            </div>

                            <div class="weather__count">
                                2<sup><i class="far fa-circle"></i></sup>
                            </div>

                            <div class="weather__region">
                                Ташкент
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
                <script type="text/javascript">
                    (function (w, d, n, s, t) {
                        w[n] = w[n] || [];
                        w[n].push(function () {
                            Ya.Context.AdvManager.render({
                                blockId: "R-A-583185-1",
                                renderTo: "yandex_rtb_R-A-583185-1",
                                async: true
                            });
                        });
                        t = d.getElementsByTagName("script")[0];
                        s = d.createElement("script");
                        s.type = "text/javascript";
                        s.src = "//an.yandex.ru/system/context.js";
                        s.async = true;
                        t.parentNode.insertBefore(s, t);
                    })(this, this.document, "yandexContextAsyncCallbacks");
                </script>
            </div>
        </div>
    </div>


</header>

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
                            {{ $category->title }}
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
                            {{ $category->title }}
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
                            {{ $category->title }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <ul>
                <li><a href="{{ route('ads') }}">Реклама</a></li>

                <li><a href="https://solanews.uz/ru/pages/2/polzovatelskoe-soglasenie">Пользовательское соглашение</a>
                </li>
            </ul>
            <ul>

                <li><a href="{{ route('contacts') }}">Контакты</a></li>

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
            <span>Sola News © 2021. Все права защищены</span>
            <span class="d-md-inline-block d-none">|</span>
            <span>Разработка и дизайн <a href="https://usoft.uz">Usoft</a></span>
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

<script type="application/javascript">
    setTimeout(function () {
        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-2",
                    renderTo: "yandex_rtb_R-A-583185-2",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-4",
                    renderTo: "yandex_rtb_R-A-583185-4",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-5",
                    renderTo: "yandex_rtb_R-A-583185-5",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-7",
                    renderTo: "yandex_rtb_R-A-583185-7",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-9",
                    renderTo: "yandex_rtb_R-A-583185-9",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-10",
                    renderTo: "yandex_rtb_R-A-583185-10",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-11",
                    renderTo: "yandex_rtb_R-A-583185-11",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-31",
                    renderTo: "yandex_rtb_R-A-583185-31",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-32",
                    renderTo: "yandex_rtb_R-A-583185-32",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-19",
                    renderTo: "yandex_rtb_R-A-583185-19",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-20",
                    renderTo: "yandex_rtb_R-A-583185-20",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-21",
                    renderTo: "yandex_rtb_R-A-583185-21",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-22",
                    renderTo: "yandex_rtb_R-A-583185-22",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-23",
                    renderTo: "yandex_rtb_R-A-583185-23",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-24",
                    renderTo: "yandex_rtb_R-A-583185-24",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");

        (function (w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function () {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-583185-25",
                    renderTo: "yandex_rtb_R-A-583185-25",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");
    }, 1000)
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<script src="/js/app.js"></script>


<script src="{{ asset('front/js/main.min.js') }}"></script>


<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(62869513, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/62869513" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166874802-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-166874802-1');
</script>

<!-- START WWW.UZ TOP-RATING -->
<SCRIPT language="javascript" type="text/javascript">
    <!--
    top_js = "1.0";
    top_r = "id=44820&r=" + escape(document.referrer) + "&pg=" + escape(window.location.href);
    document.cookie = "smart_top=1; path=/";
    top_r += "&c=" + (document.cookie ? "Y" : "N")
    //-->
</SCRIPT>
<SCRIPT language="javascript1.1" type="text/javascript">
    <!--
    top_js = "1.1";
    top_r += "&j=" + (navigator.javaEnabled() ? "Y" : "N")
    //-->
</SCRIPT>
<SCRIPT language="javascript1.2" type="text/javascript">
    <!--
    top_js = "1.2";
    top_r += "&wh=" + screen.width + 'x' + screen.height + "&px=" +
        (((navigator.appName.substring(0, 3) == "Mic")) ? screen.colorDepth : screen.pixelDepth)
    //-->
</SCRIPT>
<SCRIPT language="javascript1.3" type="text/javascript">
    <!--
    top_js = "1.3";
    //-->
</SCRIPT>
<SCRIPT language="JavaScript" type="text/javascript">
    <!--
    top_rat = "&col=340F6E&t=ffffff&p=BD6F6F";
    top_r += "&js=" + top_js + "";
    document.write('<img src="https://cnt0.www.uz/counter/collect?' + top_r + top_rat + '" width=0 height=0 border=0 />')//-->
</SCRIPT>
<NOSCRIPT><IMG height=0
               src="https://cnt0.www.uz/counter/collect?id=44820&pg=http%3A//uzinfocom.uz&col=340F6E&t=ffffff&p=BD6F6F"
               width=0 border=0/></NOSCRIPT><!-- FINISH WWW.UZ TOP-RATING -->
</body>

</html>
