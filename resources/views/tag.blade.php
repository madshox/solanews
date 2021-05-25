@extends('layouts.master')
<?php $loc = session()->get('locale') ? : Config::get('app.locale') ?>
@section('title', $tag->name[$loc])

@section('content')
    <main id="app">
        <section class="section-category">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-8">
                        <div class="row category-row">
                            <div class="col-12">
                                <div class="catalogBtn">
                                    @foreach($tagList as $tagItem)
                                        <div
                                            class="catalogBtn__item @if(Route::current()->tag == $tagItem->name[$loc]) active @endif">
                                            <a class="mybtn mybtn__green" href="{{ route('tag', $tagItem->slug) }}">
                                                {{ $tagItem->name[$loc] }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 my-3">
                                <div
                                    class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                                    <h1 class="section__title">{{ $tag->name[$loc] }}</h1>

{{--                                    Tab-start--}}
                                    <section class="section-filter">
                                        <ul class="nav mb-3 filter">
                                            <li class="nav-item filter__item"><a class="active" data-toggle="tab" href="#home">@lang("latest")</a></li>
                                            <li class="filter__item"><a class="" data-toggle="tab" href="#menu1">@lang("popular")</a></li>
                                        </ul>
                                    </section>
{{--                                    Tab-end--}}

                                </div>
                            </div>
                            <div class="tab-content container">
                                <div id="home" class="tab-pane active">
                                    <div class="row">
                                        @foreach($latestPost as $post)
                                            <div class="col-md-12 col-lg-6 my-2">
                                                <div class="row">
                                                    <div class="col-md-5 col-lg-12">
                                                        <div class="news news__bottom">
                                                            <div class="news__viewed d-md-none d-lg-block d-block"><i
                                                                    class="fas fa-eye"></i> {{ $post->count_view }}
                                                            </div>
                                                            <div class="news__img d-block">
                                                                <a href="{{ route('post', [$post->category, $post]) }}">
                                                                    <img class="newsImg__mini" src="{{ Storage::url($post->img) }}">
                                                                </a>
                                                            </div>
                                                            <div class="my-2 news__dates">
                                                                <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                                                <!-- <div class="news__time mr-1">19:00</div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7 col-lg-12">
                                                        <div class="news news__bottom">
                                                            <div class="news__viewed mb-0 d-none d-md-block d-lg-none"><i
                                                                    class="fas fa-eye"></i> {{ $post->count_view }}</div>
                                                            <div class="news__content mt-3 mt-md-0 mt-lg-3">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="news__category mr-2">
                                                                        @foreach($post->tags as $tag)
                                                                            <span><a href="{{ route('tag', ['tag' => $tag->slug]) }}">{{ $tag->name[$loc] }}</a></span>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <h2 class="news__title--small my-1">
                                                                    <a href="{{ route('post', [$post->category, $post]) }}">
                                                                        {{ $post->title }}
                                                                    </a>
                                                                </h2>
                                                                <div class="news__subtitle">
                                                                    {!! $post->description !!}
                                                                </div>
                                                                <div class="my-border">
                                                                    <div class="news__dates--two">
                                                                        <!-- <div class="news__date mr-1">17 октября</div> -->
                                                                        <div class="news__time mr-1">19:00</div>
                                                                        <div class="news__category--title">• Парламентская газета</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane">
                                    <div class="row">
                                        @foreach($popularPost as $post)
                                            <div class="col-md-12 col-lg-6 my-2">
                                            <div class="row">
                                                <div class="col-md-5 col-lg-12">
                                                    <div class="news news__bottom">
                                                        <div class="news__viewed d-md-none d-lg-block d-block"><i
                                                                class="fas fa-eye"></i> {{ $post->count_view }}
                                                        </div>
                                                        <div class="news__img d-block">
                                                            <a href="{{ route('post', [$post->category, $post]) }}">
                                                                <img class="newsImg__mini" src="{{ Storage::url($post->img) }}">
                                                            </a>
                                                        </div>
                                                        <div class="my-2 news__dates">
                                                            <div class="news__date mr-1">{{ $post->updated_at->format('j F') }}</div>
                                                            <!-- <div class="news__time mr-1">19:00</div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-lg-12">
                                                    <div class="news news__bottom">
                                                        <div class="news__viewed mb-0 d-none d-md-block d-lg-none"><i
                                                                class="fas fa-eye"></i> {{ $post->count_view }}</div>
                                                        <div class="news__content mt-3 mt-md-0 mt-lg-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="news__category mr-2">
                                                                    @foreach($post->tags as $tag)
                                                                    <span><a href="{{ route('tag', ['tag' => $tag->slug]) }}">{{ $tag->name[$loc] }}</a></span>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <h2 class="news__title--small my-1">
                                                                <a href="{{ route('post', [$post->category, $post]) }}">
                                                                    {{ $post->title }}
                                                                </a>
                                                            </h2>
                                                            <div class="news__subtitle">
                                                                {!! $post->description !!}
                                                            </div>
                                                            <div class="my-border">
                                                                <div class="news__dates--two">
                                                                    <!-- <div class="news__date mr-1">17 октября</div> -->
                                                                    <div class="news__time mr-1">19:00</div>
                                                                    <div class="news__category--title">• Парламентская газета</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12  my-pagination">
                                {{ $latestPost->links() }}
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <script async
                                        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                <!-- Header Mobile -->
                                <ins class="adsbygoogle"
                                     style="display:block"
                                     data-ad-client="ca-pub-3471883509518767"
                                     data-ad-slot="8844882326"
                                     data-ad-format="auto"
                                     data-full-width-responsive="true"></ins>
                                <script>
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container rek-container">
                <div class="rek">
                </div>
            </div>
        </section>
    </main>
@endsection
