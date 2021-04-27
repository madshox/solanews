@extends('layouts.master')
@section('title', 'Solanews.uz — Новости сегодня: самые свежие и последние новости Узбекистана и мира.')

@section('content')
    <main>
        <!-- 1 -->
        <section class="section-news" id="news">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 1)
                        @foreach($category->posts as $post)

                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a>
                                    </h1>


                                    <!-- Filter -->
                                    <section class="section-filter">
                                        <div class="filter">
                                            <div class="filter__item">
                                                <a class="" href="#">Последние</a>
                                            </div>
                                            <div class="filter__item">
                                                <a class="active" href="#">Популярные</a>
                                            </div>
                                        </div>
                                    </section>
                </div>

                {{--head news--}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__viewed"><i class="fas fa-eye"></i>c</div>
                            <div class="news__img">
                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                    <img class="newsImg__big"
                                         src="{{ Storage::url($post->img) }}">
                                </a>
                                <div class="news__icon">
                                    <img src="{{ asset('front/img/news_icon.png') }}" alt="news_icon">
                                </div>
                            </div>
                            <div class="my-2 news__dates">
                                <div class="news__date mr-1">17 октября</div>
                                <!-- <div class="news__time mr-1">19:00</div> -->
                                <div class="news__category--title">• Парламентская газета</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__content mt-md-3 mt-1">
                                <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                <div class="d-flex align-items-center py-2">
                                    <div class="news__category mr-2">
                                        <span><a href="category.html">Политика</a></span>
                                        <span><a href="category.html">Законодательство</a></span>
                                        <span><a href="category.html">Спорт</a></span>
                                    </div>
                                </div>
                                <h2 class="news__title--big">
                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <div class="news__subtitle">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-9 col-lg-8">
                        <div class="row">
                        @endif
                        <!-- first-loop-End -->
                            @if(!$loop->first)
                                <div class="col-md-12 col-lg-6 my-2">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed d-none d-lg-block"><i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__img">
                                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                        <img class="newsImg__mini"
                                                             src="{{ Storage::url($post->img) }}">
                                                    </a>
                                                </div>
                                                <div class="my-2 news__dates">
                                                    <div class="news__time mr-1">19:00</div>
                                                    <div class="news__category--title">• Парламентская
                                                        газета
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed mb-0 d-none d-md-block d-lg-none">
                                                    <i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="news__category mr-2">
                                                                        <span><a
                                                                                href="category.html">Политика</a></span>
                                                            <span><a href="category.html">Спорт</a></span>
                                                            <span><a
                                                                    href="category.html">Технологии</a></span>
                                                        </div>
                                                    </div>
                                                    <h3 class="news__title--small my-1">
                                                        <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h3>
                                                    <div
                                                        class="news__subtitle">{!! $post->description !!}</div>
                                                    <div class="my-border">
                                                        <div class="news__dates--two">
                                                            <div class="news__time mr-1">19:00</div>
                                                            <div class="news__category--title">•
                                                                Парламентская
                                                                газета
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                    {{--square adwertising--}}
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <img src="{{ asset('front/img/rek4.png') }}" alt="Rek">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--Gorizontal adwertising--}}
            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <img class="img-fluid" src="{{ asset('front/img/rek1.png') }}" alt="Rek">
                    </div>
                    <div class="rek__vertical d-block d-md-none">
                        <img class="w-100 h-auto" src="{{ asset('front/img/rek5.png') }}" alt="Rek">
                    </div>
                </div>
            </div>
        </section>

        <!-- 2 -->
        <section class="section-news" id="sport">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 2)
                        @foreach($category->posts as $post)

                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a>
                                    </h1>


                                    <!-- Filter -->
                                    <section class="section-filter">
                                        <div class="filter">
                                            <div class="filter__item">
                                                <a class="" href="#">Последние</a>
                                            </div>
                                            <div class="filter__item">
                                                <a class="active" href="#">Популярные</a>
                                            </div>
                                        </div>
                                    </section>
                </div>

                {{--head news--}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                            <div class="news__img">
                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                    <img class="newsImg__big"
                                         src="{{ Storage::url($post->img) }}">
                                </a>
                                <div class="news__icon">
                                    <img src="{{ asset('front/img/news_icon.png') }}" alt="news_icon">
                                </div>
                            </div>
                            <div class="my-2 news__dates">
                                <div class="news__date mr-1">17 октября</div>
                                <!-- <div class="news__time mr-1">19:00</div> -->
                                <div class="news__category--title">• Парламентская газета</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__content mt-md-3 mt-1">
                                <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                                <div class="d-flex align-items-center py-2">
                                    <div class="news__category mr-2">
                                        <span><a href="category.html">Политика</a></span>
                                        <span><a href="category.html">Законодательство</a></span>
                                        <span><a href="category.html">Спорт</a></span>
                                    </div>
                                </div>
                                <h2 class="news__title--big">
                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <div class="news__subtitle">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-9 col-lg-8">
                        <div class="row">
                        @endif
                        <!-- first-loop-End -->
                            @if(!$loop->first)
                                <div class="col-md-12 col-lg-6 my-2">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed d-none d-lg-block"><i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__img">
                                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                        <img class="newsImg__mini"
                                                             src="{{ Storage::url($post->img) }}">
                                                    </a>
                                                </div>
                                                <div class="my-2 news__dates">
                                                    <div class="news__time mr-1">19:00</div>
                                                    <div class="news__category--title">• Парламентская
                                                        газета
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed mb-0 d-none d-md-block d-lg-none">
                                                    <i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="news__category mr-2">
                                                                        <span><a
                                                                                href="category.html">Политика</a></span>
                                                            <span><a href="category.html">Спорт</a></span>
                                                            <span><a
                                                                    href="category.html">Технологии</a></span>
                                                        </div>
                                                    </div>
                                                    <h3 class="news__title--small my-1">
                                                        <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h3>
                                                    <div
                                                        class="news__subtitle">{!! $post->description !!}</div>
                                                    <div class="my-border">
                                                        <div class="news__dates--two">
                                                            <div class="news__time mr-1">19:00</div>
                                                            <div class="news__category--title">•
                                                                Парламентская
                                                                газета
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <img src="{{ asset('front/img/rek4.png') }}" alt="Rek">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <img class="img-fluid" src="{{ asset('front/img/rek1_5.png') }}" alt="Rek">
                    </div>
                    <div class="rek__vertical d-block d-md-none">
                        <img class="w-100 h-auto" src="{{ asset('front/img/rek5.png') }}" alt="Rek">
                    </div>
                </div>
            </div>
        </section>

        <!-- 3 -->
        <section class="section-news" id="technology">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 3)
                        @foreach($category->posts as $post)

                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a>
                                    </h1>


                                    <!-- Filter -->
                                    <section class="section-filter">
                                        <div class="filter">
                                            <div class="filter__item">
                                                <a class="" href="#">Последние</a>
                                            </div>
                                            <div class="filter__item">
                                                <a class="active" href="#">Популярные</a>
                                            </div>
                                        </div>
                                    </section>
                </div>

                {{--head news--}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                            <div class="news__img">
                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                    <img class="newsImg__big"
                                         src="{{ Storage::url($post->img) }}">
                                </a>
                                <div class="news__icon">
                                    <img src="{{ asset('front/img/news_icon.png') }}" alt="news_icon">
                                </div>
                            </div>
                            <div class="my-2 news__dates">
                                <div class="news__date mr-1">17 октября</div>
                                <!-- <div class="news__time mr-1">19:00</div> -->
                                <div class="news__category--title">• Парламентская газета</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__content mt-md-3 mt-1">
                                <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                                <div class="d-flex align-items-center py-2">
                                    <div class="news__category mr-2">
                                        <span><a href="category.html">Политика</a></span>
                                        <span><a href="category.html">Законодательство</a></span>
                                        <span><a href="category.html">Спорт</a></span>
                                    </div>
                                </div>
                                <h2 class="news__title--big">
                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <div class="news__subtitle">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-9 col-lg-8">
                        <div class="row">
                        @endif
                        <!-- first-loop-End -->
                            @if(!$loop->first)
                                <div class="col-md-12 col-lg-6 my-2">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed d-none d-lg-block"><i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__img">
                                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                        <img class="newsImg__mini"
                                                             src="{{ Storage::url($post->img) }}">
                                                    </a>
                                                </div>
                                                <div class="my-2 news__dates">
                                                    <div class="news__time mr-1">19:00</div>
                                                    <div class="news__category--title">• Парламентская
                                                        газета
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed mb-0 d-none d-md-block d-lg-none">
                                                    <i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="news__category mr-2">
                                                                        <span><a
                                                                                href="category.html">Политика</a></span>
                                                            <span><a href="category.html">Спорт</a></span>
                                                            <span><a
                                                                    href="category.html">Технологии</a></span>
                                                        </div>
                                                    </div>
                                                    <h3 class="news__title--small my-1">
                                                        <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h3>
                                                    <div
                                                        class="news__subtitle">{!! $post->description !!}</div>
                                                    <div class="my-border">
                                                        <div class="news__dates--two">
                                                            <div class="news__time mr-1">19:00</div>
                                                            <div class="news__category--title">•
                                                                Парламентская
                                                                газета
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <img src="{{ asset('front/img/rek4.png') }}" alt="Rek">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <img class="img-fluid" src="{{ asset('front/img/rek1_5.png') }}" alt="Rek">
                    </div>
                    <div class="rek__vertical d-block d-md-none">
                        <img class="w-100 h-auto" src="{{ asset('front/img/rek3.png') }}" alt="Rek">
                    </div>
                </div>
            </div>
        </section>

        <!-- Популярные новости -->
        <section class="section-popular_news" id="popular_news">
            <div class="container">
                <h1 class="section__title text-white mb-4">Популярные <a href="#">новости</a></h1>

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="news__sliders">
                                <div class="news news__slider">
                                    <div class="news__img">
                                        <a href="news-item.html">
                                            <img class="newsImg__slider" src="https://picsum.photos/id/2/900/1600">
                                        </a>
                                    </div>
                                    <div class="my-2 news__dates">
                                        <div class="news__date mr-1">17 октября</div>
                                        <!-- <div class="news__time mr-1">19:00</div> -->
                                        <div class="news__category--title">• Парламентская газета</div>
                                    </div>
                                </div>
                                <div class="news news__slider">
                                    <div class="news__content mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="news__category mr-2">
                                                <span><a href="category.html">Политика</a></span>
                                                <span><a href="category.html">Спорт</a></span>
                                                <span><a href="category.html">Технологии</a></span>
                                            </div>
                                        </div>
                                        <div class="news__title--small my-1">
                                            <a href="news-item.html">
                                                Президент рассказал о раскрытии коррупционных
                                            </a>
                                        </div>
                                        <div class="news__subtitle">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam,
                                            quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                            commodo consequat. Duis aute irure dolor in reprehenderit in
                                            voluptate
                                            velit
                                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est
                                            laborum.
                                            Sed
                                            ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                            inventore veritatis et quasi architecto beatae vitae dicta sunt
                                            explicabo.
                                            Nemo
                                            enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                            fugit,
                                            sed
                                            quia
                                            consequuntur magni dolores eos qui ratione voluptatem sequi
                                            nesciunt.
                                            Neque
                                            porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                            consectetur,
                                            adipisci
                                            velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore
                                            magnam aliquam quaerat voluptatem.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news__sliders">
                                <div class="news news__slider">
                                    <div class="news__img">
                                        <a href="news-item.html">
                                            <img class="newsImg__slider" src="https://picsum.photos/id/32/300/800">
                                        </a>
                                    </div>
                                    <div class="my-2 news__dates">
                                        <div class="news__date mr-1">17 октября</div>
                                        <!-- <div class="news__time mr-1">19:00</div> -->
                                        <div class="news__category--title">• Парламентская газета</div>
                                    </div>
                                </div>
                                <div class="news news__slider">
                                    <div class="news__content mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="news__category mr-2">
                                                <span><a href="category.html">Политика</a></span>
                                                <span><a href="category.html">Спорт</a></span>
                                                <span><a href="category.html">Технологии</a></span>
                                            </div>
                                        </div>
                                        <div class="news__title--small my-1">
                                            <a href="news-item.html">
                                                Президент рассказал о раскрытии коррупционных
                                            </a>
                                        </div>
                                        <div class="news__subtitle">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam,
                                            quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                            commodo consequat. Duis aute irure dolor in reprehenderit in
                                            voluptate
                                            velit
                                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est
                                            laborum.
                                            Sed
                                            ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                            inventore veritatis et quasi architecto beatae vitae dicta sunt
                                            explicabo.
                                            Nemo
                                            enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                            fugit,
                                            sed
                                            quia
                                            consequuntur magni dolores eos qui ratione voluptatem sequi
                                            nesciunt.
                                            Neque
                                            porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                            consectetur,
                                            adipisci
                                            velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore
                                            magnam aliquam quaerat voluptatem.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news__sliders">
                                <div class="news news__slider">
                                    <div class="news__img">
                                        <a href="news-item.html">
                                            <img class="newsImg__slider" src="https://picsum.photos/id/12/600/400">
                                        </a>
                                    </div>
                                    <div class="my-2 news__dates">
                                        <div class="news__date mr-1">17 октября</div>
                                        <!-- <div class="news__time mr-1">19:00</div> -->
                                        <div class="news__category--title">• Парламентская газета</div>
                                    </div>
                                </div>
                                <div class="news news__slider">
                                    <div class="news__content mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="news__category mr-2">
                                                <span><a href="category.html">Политика</a></span>
                                                <span><a href="category.html">Спорт</a></span>
                                                <span><a href="category.html">Технологии</a></span>
                                            </div>
                                        </div>
                                        <div class="news__title--small my-1">
                                            <a href="news-item.html">
                                                Президент рассказал о раскрытии коррупционных
                                            </a>
                                        </div>
                                        <div class="news__subtitle">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam,
                                            quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                            commodo consequat. Duis aute irure dolor in reprehenderit in
                                            voluptate
                                            velit
                                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est
                                            laborum.
                                            Sed
                                            ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                            inventore veritatis et quasi architecto beatae vitae dicta sunt
                                            explicabo.
                                            Nemo
                                            enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                            fugit,
                                            sed
                                            quia
                                            consequuntur magni dolores eos qui ratione voluptatem sequi
                                            nesciunt.
                                            Neque
                                            porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                            consectetur,
                                            adipisci
                                            velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore
                                            magnam aliquam quaerat voluptatem.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news__sliders">
                                <div class="news news__slider">
                                    <div class="news__img">
                                        <a href="news-item.html">
                                            <img class="newsImg__slider" src="https://picsum.photos/id/11/450/300">
                                        </a>
                                    </div>
                                    <div class="my-2 news__dates">
                                        <div class="news__date mr-1">17 октября</div>
                                        <!-- <div class="news__time mr-1">19:00</div> -->
                                        <div class="news__category--title">• Парламентская газета</div>
                                    </div>
                                </div>
                                <div class="news news__slider">
                                    <div class="news__content mt-3">
                                        <div class="d-flex align-items-center">
                                            <div class="news__category mr-2">
                                                <span><a href="category.html">Политика</a></span>
                                                <span><a href="category.html">Спорт</a></span>
                                                <span><a href="category.html">Технологии</a></span>
                                            </div>
                                        </div>
                                        <div class="news__title--small my-1">
                                            <a href="news-item.html">
                                                Президент рассказал о раскрытии коррупционных
                                            </a>
                                        </div>
                                        <div class="news__subtitle">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                            veniam,
                                            quis
                                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                            commodo consequat. Duis aute irure dolor in reprehenderit in
                                            voluptate
                                            velit
                                            esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est
                                            laborum.
                                            Sed
                                            ut perspiciatis unde omnis iste natus error sit voluptatem
                                            accusantium
                                            doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                                            inventore veritatis et quasi architecto beatae vitae dicta sunt
                                            explicabo.
                                            Nemo
                                            enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                            fugit,
                                            sed
                                            quia
                                            consequuntur magni dolores eos qui ratione voluptatem sequi
                                            nesciunt.
                                            Neque
                                            porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                            consectetur,
                                            adipisci
                                            velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                            dolore
                                            magnam aliquam quaerat voluptatem.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>

        <!-- 4 -->
        <section class="section-news" id="auto">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 4)
                        @foreach($category->posts as $post)

                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a>
                                    </h1>


                                    <!-- Filter -->
                                    <section class="section-filter">
                                        <div class="filter">
                                            <div class="filter__item">
                                                <a class="" href="#">Последние</a>
                                            </div>
                                            <div class="filter__item">
                                                <a class="active" href="#">Популярные</a>
                                            </div>
                                        </div>
                                    </section>
                </div>

                {{--head news--}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                            <div class="news__img">
                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                    <img class="newsImg__big"
                                         src="{{ Storage::url($post->img) }}">
                                </a>
                                <div class="news__icon">
                                    <img src="{{ asset('front/img/news_icon.png') }}" alt="news_icon">
                                </div>
                            </div>
                            <div class="my-2 news__dates">
                                <div class="news__date mr-1">17 октября</div>
                                <!-- <div class="news__time mr-1">19:00</div> -->
                                <div class="news__category--title">• Парламентская газета</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__content mt-md-3 mt-1">
                                <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                                <div class="d-flex align-items-center py-2">
                                    <div class="news__category mr-2">
                                        <span><a href="category.html">Политика</a></span>
                                        <span><a href="category.html">Законодательство</a></span>
                                        <span><a href="category.html">Спорт</a></span>
                                    </div>
                                </div>
                                <h2 class="news__title--big">
                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <div class="news__subtitle">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-9 col-lg-8">
                        <div class="row">
                        @endif
                        <!-- first-loop-End -->
                            @if(!$loop->first)
                                <div class="col-md-12 col-lg-6 my-2">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed d-none d-lg-block"><i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__img">
                                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                        <img class="newsImg__mini"
                                                             src="{{ Storage::url($post->img) }}">
                                                    </a>
                                                </div>
                                                <div class="my-2 news__dates">
                                                    <div class="news__time mr-1">19:00</div>
                                                    <div class="news__category--title">• Парламентская
                                                        газета
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed mb-0 d-none d-md-block d-lg-none">
                                                    <i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="news__category mr-2">
                                                                        <span><a
                                                                                href="category.html">Политика</a></span>
                                                            <span><a href="category.html">Спорт</a></span>
                                                            <span><a
                                                                    href="category.html">Технологии</a></span>
                                                        </div>
                                                    </div>
                                                    <h3 class="news__title--small my-1">
                                                        <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h3>
                                                    <div
                                                        class="news__subtitle">{!! $post->description !!}</div>
                                                    <div class="my-border">
                                                        <div class="news__dates--two">
                                                            <div class="news__time mr-1">19:00</div>
                                                            <div class="news__category--title">•
                                                                Парламентская
                                                                газета
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <img src="{{ asset('front/img/rek4.png') }}" alt="Rek">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <img class="img-fluid" src="{{ asset('front/img/rek1_5.png') }}" alt="Rek">
                    </div>
                    <div class="rek__vertical d-block d-md-none">
                        <img class="w-100 h-auto" src="{{ asset('front/img/rek5.png') }}" alt="Rek">
                    </div>
                </div>
            </div>
        </section>

        <!-- 5 -->
        <section class="section-news" id="world">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 5)
                        @foreach($category->posts as $post)

                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a>
                                    </h1>


                                    <!-- Filter -->
                                    <section class="section-filter">
                                        <div class="filter">
                                            <div class="filter__item">
                                                <a class="" href="#">Последние</a>
                                            </div>
                                            <div class="filter__item">
                                                <a class="active" href="#">Популярные</a>
                                            </div>
                                        </div>
                                    </section>
                </div>

                {{--head news--}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                            <div class="news__img">
                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                    <img class="newsImg__big"
                                         src="{{ Storage::url($post->img) }}">
                                </a>
                                <div class="news__icon">
                                    <img src="{{ asset('front/img/news_icon.png') }}" alt="news_icon">
                                </div>
                            </div>
                            <div class="my-2 news__dates">
                                <div class="news__date mr-1">17 октября</div>
                                <!-- <div class="news__time mr-1">19:00</div> -->
                                <div class="news__category--title">• Парламентская газета</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__content mt-md-3 mt-1">
                                <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                                <div class="d-flex align-items-center py-2">
                                    <div class="news__category mr-2">
                                        <span><a href="category.html">Политика</a></span>
                                        <span><a href="category.html">Законодательство</a></span>
                                        <span><a href="category.html">Спорт</a></span>
                                    </div>
                                </div>
                                <h2 class="news__title--big">
                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <div class="news__subtitle">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-9 col-lg-8">
                        <div class="row">
                        @endif
                        <!-- first-loop-End -->
                            @if(!$loop->first)
                                <div class="col-md-12 col-lg-6 my-2">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed d-none d-lg-block"><i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__img">
                                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                        <img class="newsImg__mini"
                                                             src="{{ Storage::url($post->img) }}">
                                                    </a>
                                                </div>
                                                <div class="my-2 news__dates">
                                                    <div class="news__time mr-1">19:00</div>
                                                    <div class="news__category--title">• Парламентская
                                                        газета
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed mb-0 d-none d-md-block d-lg-none">
                                                    <i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="news__category mr-2">
                                                                        <span><a
                                                                                href="category.html">Политика</a></span>
                                                            <span><a href="category.html">Спорт</a></span>
                                                            <span><a
                                                                    href="category.html">Технологии</a></span>
                                                        </div>
                                                    </div>
                                                    <h3 class="news__title--small my-1">
                                                        <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h3>
                                                    <div
                                                        class="news__subtitle">{!! $post->description !!}</div>
                                                    <div class="my-border">
                                                        <div class="news__dates--two">
                                                            <div class="news__time mr-1">19:00</div>
                                                            <div class="news__category--title">•
                                                                Парламентская
                                                                газета
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <img src="{{ asset('front/img/rek4.png') }}" alt="Rek">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <img class="img-fluid" src="{{ asset('front/img/rek1_3.png') }}" alt="Rek">
                    </div>
                    <div class="rek__vertical d-block d-md-none">
                        <img class="w-100 h-auto" src="{{ asset('front/img/rek2.png') }}" alt="Rek">
                    </div>
                </div>
            </div>
        </section>

        <!-- 6 -->
        <section class="section-news" id="science">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 6)
                        @foreach($category->posts as $post)

                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a>
                                    </h1>


                                    <!-- Filter -->
                                    <section class="section-filter">
                                        <div class="filter">
                                            <div class="filter__item">
                                                <a class="" href="#">Последние</a>
                                            </div>
                                            <div class="filter__item">
                                                <a class="active" href="#">Популярные</a>
                                            </div>
                                        </div>
                                    </section>
                </div>

                {{--head news--}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                            <div class="news__img">
                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                    <img class="newsImg__big"
                                         src="{{ Storage::url($post->img) }}">
                                </a>
                                <div class="news__icon">
                                    <img src="{{ asset('front/img/news_icon.png') }}" alt="news_icon">
                                </div>
                            </div>
                            <div class="my-2 news__dates">
                                <div class="news__date mr-1">17 октября</div>
                                <!-- <div class="news__time mr-1">19:00</div> -->
                                <div class="news__category--title">• Парламентская газета</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__content mt-md-3 mt-1">
                                <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                                <div class="d-flex align-items-center py-2">
                                    <div class="news__category mr-2">
                                        <span><a href="category.html">Политика</a></span>
                                        <span><a href="category.html">Законодательство</a></span>
                                        <span><a href="category.html">Спорт</a></span>
                                    </div>
                                </div>
                                <h2 class="news__title--big">
                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <div class="news__subtitle">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-9 col-lg-8">
                        <div class="row">
                        @endif
                        <!-- first-loop-End -->
                            @if(!$loop->first)
                                <div class="col-md-12 col-lg-6 my-2">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed d-none d-lg-block"><i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__img">
                                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                        <img class="newsImg__mini"
                                                             src="{{ Storage::url($post->img) }}">
                                                    </a>
                                                </div>
                                                <div class="my-2 news__dates">
                                                    <div class="news__time mr-1">19:00</div>
                                                    <div class="news__category--title">• Парламентская
                                                        газета
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed mb-0 d-none d-md-block d-lg-none">
                                                    <i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="news__category mr-2">
                                                                        <span><a
                                                                                href="category.html">Политика</a></span>
                                                            <span><a href="category.html">Спорт</a></span>
                                                            <span><a
                                                                    href="category.html">Технологии</a></span>
                                                        </div>
                                                    </div>
                                                    <h3 class="news__title--small my-1">
                                                        <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h3>
                                                    <div
                                                        class="news__subtitle">{!! $post->description !!}</div>
                                                    <div class="my-border">
                                                        <div class="news__dates--two">
                                                            <div class="news__time mr-1">19:00</div>
                                                            <div class="news__category--title">•
                                                                Парламентская
                                                                газета
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <img src="{{ asset('front/img/rek4.png') }}" alt="Rek">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <img class="img-fluid" src="{{ asset('front/img/rek1_2.png') }}" alt="Rek">
                    </div>
                    <div class="rek__vertical d-block d-md-none">
                        <img class="w-100 h-auto" src="{{ asset('front/img/rek4.png') }}" alt="Rek">
                    </div>
                </div>
            </div>
        </section>

        <!-- 7 -->
        <section class="section-news" id="town">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 7)
                        @foreach($category->posts as $post)

                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a>
                                    </h1>


                                    <!-- Filter -->
                                    <section class="section-filter">
                                        <div class="filter">
                                            <div class="filter__item">
                                                <a class="" href="#">Последние</a>
                                            </div>
                                            <div class="filter__item">
                                                <a class="active" href="#">Популярные</a>
                                            </div>
                                        </div>
                                    </section>
                </div>

                {{--head news--}}
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                            <div class="news__img">
                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                    <img class="newsImg__big"
                                         src="{{ Storage::url($post->img) }}">
                                </a>
                                <div class="news__icon">
                                    <img src="{{ asset('front/img/news_icon.png') }}" alt="news_icon">
                                </div>
                            </div>
                            <div class="my-2 news__dates">
                                <div class="news__date mr-1">17 октября</div>
                                <!-- <div class="news__time mr-1">19:00</div> -->
                                <div class="news__category--title">• Парламентская газета</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="news news__top">
                            <div class="news__content mt-md-3 mt-1">
                                <div class="news__viewed"><i class="fas fa-eye"></i> {{ $post->count_view }}</div>
                                <div class="d-flex align-items-center py-2">
                                    <div class="news__category mr-2">
                                        <span><a href="category.html">Политика</a></span>
                                        <span><a href="category.html">Законодательство</a></span>
                                        <span><a href="category.html">Спорт</a></span>
                                    </div>
                                </div>
                                <h2 class="news__title--big">
                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <div class="news__subtitle">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-9 col-lg-8">
                        <div class="row">
                        @endif
                        <!-- first-loop-End -->
                            @if(!$loop->first)
                                <div class="col-md-12 col-lg-6 my-2">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed d-none d-lg-block"><i
                                                        class="fas fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__img">
                                                    <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                        <img class="newsImg__mini"
                                                             src="{{ Storage::url($post->img) }}">
                                                    </a>
                                                </div>
                                                <div class="my-2 news__dates">
                                                    <div class="news__time mr-1">19:00</div>
                                                    <div class="news__category--title">• Парламентская
                                                        газета
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-lg-12">
                                            <div class="news news__bottom">
                                                <div class="news__viewed mb-0 d-none d-md-block d-lg-none">
                                                    <i class="fa fa-eye"></i> {{ $post->count_view }}
                                                </div>
                                                <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="news__category mr-2">
                                                                        <span><a
                                                                                href="category.html">Политика</a></span>
                                                            <span><a href="category.html">Спорт</a></span>
                                                            <span><a
                                                                    href="category.html">Технологии</a></span>
                                                        </div>
                                                    </div>
                                                    <h3 class="news__title--small my-1">
                                                        <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h3>
                                                    <div
                                                        class="news__subtitle">{!! $post->description !!}</div>
                                                    <div class="my-border">
                                                        <div class="news__dates--two">
                                                            <div class="news__time mr-1">19:00</div>
                                                            <div class="news__category--title">•
                                                                Парламентская
                                                                газета
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <img src="{{ asset('front/img/rek4.png') }}" alt="Rek">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <img class="img-fluid" src="{{ asset('front/img/rek1_5.png') }}" alt="Rek">
                    </div>
                    <div class="rek__vertical d-block d-md-none">
                        <img class="w-100 h-auto" src="{{ asset('front/img/rek5.png') }}" alt="Rek">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
a
