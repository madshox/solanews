@extends('layouts.master')
@section('title', 'Solanews.uz — Новости сегодня: самые свежие и @lang("latest") новости Узбекистана и мира.')

@section('content')
    @if(session()->has('warning'))
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <strong>{{ session()->get('warning') }}</strong>
                </div>
            </div>
        </div>
    @endif
    <main>
        <!-- 1 -->
        <section class="section-news" id="news">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 1)
                        @foreach($category->latestPosts as $post)
                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>

                                    {{--Tab-start--}}
                                    <section class="section-filter">
                                        <ul class="nav mb-3 filter" role="tablist">
                                            <li class="nav-item filter__item">
                                                <a class="active"
                                                   id="first-tab" data-toggle="tab"
                                                   href="#first" aria-controls="first"
                                                   role="tab" aria-selected="true">
                                                    @lang("latest")
                                                </a>
                                            </li>
                                            <li class="filter__item">
                                                <a class=""
                                                   id="first2-tab" data-toggle="tab"
                                                   href="#first2" aria-controls="first2"
                                                   role="tab" aria-selected="true">
                                                    @lang("popular")
                                                </a>
                                            </li>
                                        </ul>
                                    </section>
                                    {{--Tab-end--}}
                </div>

            <div class="tab-content">
                <div class="tab-pane active" id="first"
                     aria-labelledby="first-tab" role="tabpanel">

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
                                    <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="news news__top">
                                <div class="news__content mt-md-3 mt-1">
                                    <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                    <div class="d-flex align-items-center py-2">
                                        <div class="news__category mr-2">
                                            @foreach($post->tags as $tag)
                                                <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                            @endforeach
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
                                                        <div
                                                            class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                @foreach($post->tags as $tag)
                                                                    <span><a href="{{ route('index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <h3 class="news__title--small my-1">
                                                            <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                {{ $post->title }}
                                                            </a>
                                                        </h3>
                                                        <div
                                                            class="news__subtitle">{!! $post->description !!}
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
                <div class="tab-pane" id="first2"
                     aria-labelledby="first2-tab" role="tabpanel">
                @foreach($categories as $category)
                    @if($category->position == 1)
                        @foreach($category->popularPosts as $post)
                            <!-- first-loop -->
                                @if($loop->first)
{{--                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>--}}
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
                                                    <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news news__top">
                                                <div class="news__content mt-md-3 mt-1">
                                                    <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                                    <div class="d-flex align-items-center py-2">
                                                        <div class="news__category mr-2">
                                                            @foreach($post->tags as $tag)
                                                                <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                            @endforeach
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
                                                                        <div
                                                                            class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                                @foreach($post->tags as $tag)
                                                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <h3 class="news__title--small my-1">
                                                                            <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                                {{ $post->title }}
                                                                            </a>
                                                                        </h3>
                                                                        <div
                                                                            class="news__subtitle">{!! $post->description !!}
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
        <section class="section-news" id="news">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 2)
                        @foreach($category->latestPosts as $post)
                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>

                                    {{--Tab-start--}}
                                    <section class="section-filter">
                                        <ul class="nav mb-3 filter" role="tablist">
                                            <li class="nav-item filter__item">
                                                <a class="active"
                                                   id="second-tab" data-toggle="tab"
                                                   href="#second" aria-controls="second"
                                                   role="tab" aria-selected="true">
                                                    @lang("latest")
                                                </a>
                                            </li>
                                            <li class="filter__item">
                                                <a class=""
                                                   id="second2-tab" data-toggle="tab"
                                                   href="#second2" aria-controls="second2"
                                                   role="tab" aria-selected="true">
                                                    @lang("popular")
                                                </a>
                                            </li>
                                        </ul>
                                    </section>
                                    {{--Tab-end--}}
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="second"
                         aria-labelledby="second-tab" role="tabpanel">

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
                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news news__top">
                                    <div class="news__content mt-md-3 mt-1">
                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="news__category mr-2">
                                                @foreach($post->tags as $tag)
                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                @endforeach
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
                                                            <div
                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                    @foreach($post->tags as $tag)
                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <h3 class="news__title--small my-1">
                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                    {{ $post->title }}
                                                                </a>
                                                            </h3>
                                                            <div
                                                                class="news__subtitle">{!! $post->description !!}
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
                    <div class="tab-pane" id="second2"
                         aria-labelledby="second2-tab" role="tabpanel">
                    @foreach($categories as $category)
                        @if($category->position == 2)
                            @foreach($category->popularPosts as $post)
                                <!-- first-loop -->
                                    @if($loop->first)
                                        {{--                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>--}}
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
                                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="news news__top">
                                                    <div class="news__content mt-md-3 mt-1">
                                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                                        <div class="d-flex align-items-center py-2">
                                                            <div class="news__category mr-2">
                                                                @foreach($post->tags as $tag)
                                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                @endforeach
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
                                                                            <div
                                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                                    @foreach($post->tags as $tag)
                                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="news__title--small my-1">
                                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                                    {{ $post->title }}
                                                                                </a>
                                                                            </h3>
                                                                            <div
                                                                                class="news__subtitle">{!! $post->description !!}
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

        <!-- 3 -->
        <section class="section-news" id="news">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 3)
                        @foreach($category->latestPosts as $post)
                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>

                                    {{--Tab-start--}}
                                    <section class="section-filter">
                                        <ul class="nav mb-3 filter" role="tablist">
                                            <li class="nav-item filter__item">
                                                <a class="active"
                                                   id="third-tab" data-toggle="tab"
                                                   href="#third" aria-controls="third"
                                                   role="tab" aria-selected="true">
                                                    @lang("latest")
                                                </a>
                                            </li>
                                            <li class="filter__item">
                                                <a class=""
                                                   id="third2-tab" data-toggle="tab"
                                                   href="#third2" aria-controls="third2"
                                                   role="tab" aria-selected="true">
                                                    @lang("popular")
                                                </a>
                                            </li>
                                        </ul>
                                    </section>
                                    {{--Tab-end--}}
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="third"
                         aria-labelledby="third-tab" role="tabpanel">

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
                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news news__top">
                                    <div class="news__content mt-md-3 mt-1">
                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="news__category mr-2">
                                                @foreach($post->tags as $tag)
                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                @endforeach
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
                                                            <div
                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                    @foreach($post->tags as $tag)
                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <h3 class="news__title--small my-1">
                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                    {{ $post->title }}
                                                                </a>
                                                            </h3>
                                                            <div
                                                                class="news__subtitle">{!! $post->description !!}
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
                    <div class="tab-pane" id="third2"
                         aria-labelledby="third2-tab" role="tabpanel">
                    @foreach($categories as $category)
                        @if($category->position == 3)
                            @foreach($category->popularPosts as $post)
                                <!-- first-loop -->
                                    @if($loop->first)
                                        {{--                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>--}}
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
                                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="news news__top">
                                                    <div class="news__content mt-md-3 mt-1">
                                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                                        <div class="d-flex align-items-center py-2">
                                                            <div class="news__category mr-2">
                                                                @foreach($post->tags as $tag)
                                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                @endforeach
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
                                                                            <div
                                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                                    @foreach($post->tags as $tag)
                                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="news__title--small my-1">
                                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                                    {{ $post->title }}
                                                                                </a>
                                                                            </h3>
                                                                            <div
                                                                                class="news__subtitle">{!! $post->description !!}
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

        <!-- @lang("popular") новости -->
        <section id="popular_news" class="section-popular_news">
            <div class="container"><h2 class="section__title text-white mb-4">
                    @lang("popular") <a href="#">новости</a></h2>
                <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                    <div class="swiper-wrapper"
                         style="transition-duration: 0ms; transform: translate3d(-2506.67px, 0px, 0px);">
                        @foreach($popularPost as $popular)
                            <div class="swiper-slide" data-swiper-slide-index="2"
                                 style="width: 303.333px; margin-right: 10px;">
                                <div class="news__sliders">
                                    <div class="news news__slider">
                                        <div class="news__img"><a
                                                href="{{ route('post', [$popular->category, $popular->id]) }}"><img
                                                    src="{{ Storage::url($popular->img) }}"
                                                    alt="uznews.uz - В Ташкенте на детской площадке погиб 8-летний ребенок"
                                                    class="newsImg__slider"></a></div>
                                        <div class="my-2 news__dates">
                                            <div
                                                class="news__date mr-1">{{ $popular->updated_at->format('j F') }}</div>
                                        </div>
                                    </div>
                                    <div class="news news__slider">
                                        <div class="news__content mt-3">
                                            <div class="d-flex align-items-center">
                                                <div class="news__category mr-2"></div>
                                            </div>
                                            <div class="news__title--small my-1"><a
                                                    href="{{ route('post', [$popular->category, $popular->id]) }}">
                                                    {{ $popular->title }}
                                                </a></div>
                                            <div class="news__subtitle">
                                                {!! $popular->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
                    <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
        </section>

        <!-- 4 -->
        <section class="section-news" id="news">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 4)
                        @foreach($category->latestPosts as $post)
                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>

                                    {{--Tab-start--}}
                                    <section class="section-filter">
                                        <ul class="nav mb-3 filter" role="tablist">
                                            <li class="nav-item filter__item">
                                                <a class="active"
                                                   id="fourth-tab" data-toggle="tab"
                                                   href="#fourth" aria-controls="fourth"
                                                   role="tab" aria-selected="true">
                                                    @lang("latest")
                                                </a>
                                            </li>
                                            <li class="filter__item">
                                                <a class=""
                                                   id="fourth2-tab" data-toggle="tab"
                                                   href="#fourth2" aria-controls="fourth2"
                                                   role="tab" aria-selected="true">
                                                    @lang("popular")
                                                </a>
                                            </li>
                                        </ul>
                                    </section>
                                    {{--Tab-end--}}
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="fourth"
                         aria-labelledby="fourth-tab" role="tabpanel">

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
                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news news__top">
                                    <div class="news__content mt-md-3 mt-1">
                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="news__category mr-2">
                                                @foreach($post->tags as $tag)
                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                @endforeach
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
                                                            <div
                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                    @foreach($post->tags as $tag)
                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <h3 class="news__title--small my-1">
                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                    {{ $post->title }}
                                                                </a>
                                                            </h3>
                                                            <div
                                                                class="news__subtitle">{!! $post->description !!}
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
                    <div class="tab-pane" id="fourth2"
                         aria-labelledby="fourth2-tab" role="tabpanel">
                    @foreach($categories as $category)
                        @if($category->position == 4)
                            @foreach($category->popularPosts as $post)
                                <!-- first-loop -->
                                    @if($loop->first)
                                        {{--                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>--}}
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
                                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="news news__top">
                                                    <div class="news__content mt-md-3 mt-1">
                                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                                        <div class="d-flex align-items-center py-2">
                                                            <div class="news__category mr-2">
                                                                @foreach($post->tags as $tag)
                                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                @endforeach
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
                                                                            <div
                                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                                    @foreach($post->tags as $tag)
                                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="news__title--small my-1">
                                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                                    {{ $post->title }}
                                                                                </a>
                                                                            </h3>
                                                                            <div
                                                                                class="news__subtitle">{!! $post->description !!}
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

        <!-- 5 -->
        <section class="section-news" id="news">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 5)
                        @foreach($category->latestPosts as $post)
                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>

                                    {{--Tab-start--}}
                                    <section class="section-filter">
                                        <ul class="nav mb-3 filter" role="tablist">
                                            <li class="nav-item filter__item">
                                                <a class="active"
                                                   id="fifth-tab" data-toggle="tab"
                                                   href="#fifth" aria-controls="fifth"
                                                   role="tab" aria-selected="true">
                                                    @lang("latest")
                                                </a>
                                            </li>
                                            <li class="filter__item">
                                                <a class=""
                                                   id="fifth2-tab" data-toggle="tab"
                                                   href="#fifth2" aria-controls="fifth2"
                                                   role="tab" aria-selected="true">
                                                    @lang("popular")
                                                </a>
                                            </li>
                                        </ul>
                                    </section>
                                    {{--Tab-end--}}
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="fifth"
                         aria-labelledby="fifth-tab" role="tabpanel">

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
                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news news__top">
                                    <div class="news__content mt-md-3 mt-1">
                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="news__category mr-2">
                                                @foreach($post->tags as $tag)
                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                @endforeach
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
                                                            <div
                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                    @foreach($post->tags as $tag)
                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <h3 class="news__title--small my-1">
                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                    {{ $post->title }}
                                                                </a>
                                                            </h3>
                                                            <div
                                                                class="news__subtitle">{!! $post->description !!}
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
                    <div class="tab-pane" id="fifth2"
                         aria-labelledby="fifth2-tab" role="tabpanel">
                    @foreach($categories as $category)
                        @if($category->position == 5)
                            @foreach($category->popularPosts as $post)
                                <!-- first-loop -->
                                    @if($loop->first)
                                        {{--                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>--}}
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
                                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="news news__top">
                                                    <div class="news__content mt-md-3 mt-1">
                                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                                        <div class="d-flex align-items-center py-2">
                                                            <div class="news__category mr-2">
                                                                @foreach($post->tags as $tag)
                                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                @endforeach
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
                                                                            <div
                                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                                    @foreach($post->tags as $tag)
                                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="news__title--small my-1">
                                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                                    {{ $post->title }}
                                                                                </a>
                                                                            </h3>
                                                                            <div
                                                                                class="news__subtitle">{!! $post->description !!}
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

        <!-- 6 -->
        <section class="section-news" id="news">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 6)
                        @foreach($category->latestPosts as $post)
                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>

                                    {{--Tab-start--}}
                                    <section class="section-filter">
                                        <ul class="nav mb-3 filter" role="tablist">
                                            <li class="nav-item filter__item">
                                                <a class="active"
                                                   id="sixth-tab" data-toggle="tab"
                                                   href="#sixth" aria-controls="sixth"
                                                   role="tab" aria-selected="true">
                                                    @lang("latest")
                                                </a>
                                            </li>
                                            <li class="filter__item">
                                                <a class=""
                                                   id="sixth2-tab" data-toggle="tab"
                                                   href="#sixth2" aria-controls="sixth2"
                                                   role="tab" aria-selected="true">
                                                    @lang("popular")
                                                </a>
                                            </li>
                                        </ul>
                                    </section>
                                    {{--Tab-end--}}
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="sixth"
                         aria-labelledby="sixth-tab" role="tabpanel">

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
                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news news__top">
                                    <div class="news__content mt-md-3 mt-1">
                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="news__category mr-2">
                                                @foreach($post->tags as $tag)
                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                @endforeach
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
                                                            <div
                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                    @foreach($post->tags as $tag)
                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <h3 class="news__title--small my-1">
                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                    {{ $post->title }}
                                                                </a>
                                                            </h3>
                                                            <div
                                                                class="news__subtitle">{!! $post->description !!}
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
                    <div class="tab-pane" id="sixth2"
                         aria-labelledby="sixth2-tab" role="tabpanel">
                    @foreach($categories as $category)
                        @if($category->position == 6)
                            @foreach($category->popularPosts as $post)
                                <!-- first-loop -->
                                    @if($loop->first)
                                        {{--                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>--}}
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
                                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="news news__top">
                                                    <div class="news__content mt-md-3 mt-1">
                                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                                        <div class="d-flex align-items-center py-2">
                                                            <div class="news__category mr-2">
                                                                @foreach($post->tags as $tag)
                                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                @endforeach
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
                                                                            <div
                                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                                    @foreach($post->tags as $tag)
                                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="news__title--small my-1">
                                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                                    {{ $post->title }}
                                                                                </a>
                                                                            </h3>
                                                                            <div
                                                                                class="news__subtitle">{!! $post->description !!}
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

        <!-- 7 -->
        <section class="section-news" id="news">
            <div class="container">
                <div class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                @foreach($categories as $category)
                    @if($category->position == 7)
                        @foreach($category->latestPosts as $post)
                            <!-- first-loop -->
                                @if($loop->first)
                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>

                                    {{--Tab-start--}}
                                    <section class="section-filter">
                                        <ul class="nav mb-3 filter" role="tablist">
                                            <li class="nav-item filter__item">
                                                <a class="active"
                                                   id="seventh-tab" data-toggle="tab"
                                                   href="#seventh" aria-controls="seventh"
                                                   role="tab" aria-selected="true">
                                                    @lang("latest")
                                                </a>
                                            </li>
                                            <li class="filter__item">
                                                <a class=""
                                                   id="seventh2-tab" data-toggle="tab"
                                                   href="#seventh2" aria-controls="seventh2"
                                                   role="tab" aria-selected="true">
                                                    @lang("popular")
                                                </a>
                                            </li>
                                        </ul>
                                    </section>
                                    {{--Tab-end--}}
                </div>

                <div class="tab-content">
                    <div class="tab-pane active" id="seventh"
                         aria-labelledby="seventh-tab" role="tabpanel">

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
                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="news news__top">
                                    <div class="news__content mt-md-3 mt-1">
                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                        <div class="d-flex align-items-center py-2">
                                            <div class="news__category mr-2">
                                                @foreach($post->tags as $tag)
                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                @endforeach
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
                                                            <div
                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                    @foreach($post->tags as $tag)
                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <h3 class="news__title--small my-1">
                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                    {{ $post->title }}
                                                                </a>
                                                            </h3>
                                                            <div
                                                                class="news__subtitle">{!! $post->description !!}
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
                    <div class="tab-pane" id="seventh2"
                         aria-labelledby="seventh2-tab" role="tabpanel">
                    @foreach($categories as $category)
                        @if($category->position == 7)
                            @foreach($category->popularPosts as $post)
                                <!-- first-loop -->
                                    @if($loop->first)
                                        {{--                                    <h1 class="section__title"><a href="category-item.html">{{ $category->title }}</a></h1>--}}
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
                                                        <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="news news__top">
                                                    <div class="news__content mt-md-3 mt-1">
                                                        <div class="news__viewed"><i class="fa fa-eye"></i> {{ $post->count_view }}</div>
                                                        <div class="d-flex align-items-center py-2">
                                                            <div class="news__category mr-2">
                                                                @foreach($post->tags as $tag)
                                                                    <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                @endforeach
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
                                                                            <div
                                                                                class="news__time mr-1">{{ $post->updated_at->format('j F') }}</div>
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
                                                                                    @foreach($post->tags as $tag)
                                                                                        <span><a href="{{ route('tag', ['tag' => $tag->name]) }}">{{ $tag->name }}</a></span>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <h3 class="news__title--small my-1">
                                                                                <a href="{{ route('post', [$category->slug, $post->id]) }}">
                                                                                    {{ $post->title }}
                                                                                </a>
                                                                            </h3>
                                                                            <div
                                                                                class="news__subtitle">{!! $post->description !!}
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
    </main>
@endsection
