@extends('layouts.master')
@section('title', $cat['title'])

@section('content')
    <main id="app">
        <section class="section-category">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-8">
                        <div class="row category-row">
                            <div class="col-12">
                                <div class="catalogBtn">
                                    @foreach($categories as $category)
                                        <div class="catalogBtn__item">
                                            <a class="mybtn mybtn__green"
                                               href="{{ route('category', ['slug' => $category->slug]) }}">
                                                {{ $category->title }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 my-3">
                                <div
                                    class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                                    <h1 class="section__title">В мире</h1>
                                    <!-- Filter -->
                                    <section class="section-filter">
                                        <div class="filter">
                                            <div class="filter__item">
                                                <a class="active" href="https://solanews.uz/ru/category/view/5/v-mire">
                                                    Последние </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="https://solanews.uz/ru/category/view/5/v-mire/popular">
                                                    Популярные </a>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>

{{--                            @foreach($cats as $cat)--}}
                                @foreach($cat->latestPosts as $post)
                                    <div class="col-md-12 col-lg-6 my-2">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-12">
                                                <div class="news news__bottom">
                                                    <div class="news__viewed d-md-none d-lg-block d-block"><i
                                                            class="fas fa-eye"></i> 228
                                                    </div>
                                                    <div class="news__img d-block">
                                                        <a href="{{ route('post', [$cat->slug, $post->id]) }}">
                                                            <img class="newsImg__mini"
                                                                 src="{{ Storage::url($post->img) }}"
                                                                 alt="gazeta.uz - Четыре человека погибли при стрельбе в офисе в Калифорнии">
                                                        </a>
                                                    </div>
                                                    <div class="my-2 news__dates">
                                                        <div class="news__date mr-1">02 апреля</div>
                                                        <!--<div class="news__category--title">• gazeta.uz</div>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-lg-12">
                                                <div class="news news__bottom">
                                                    <div class="news__viewed mb-0 d-none d-md-block d-lg-none">
                                                        <i class="fas fa-eye"></i> 228
                                                    </div>

                                                    <div class="news__content mt-3 mt-md-0 mt-lg-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="news__category mr-2">
                                                                                                                    <span>
                                                                <a href="https://solanews.uz/ru/tags/view/5/31/prestupleniya/popular">
                                                                    Преступления
                                                                </a>
                                                            </span>
                                                                <span>
                                                                <a href="https://solanews.uz/ru/tags/view/5/30/proissestviya/popular">
                                                                    Происшествия
                                                                </a>
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <h2 class="news__title--small my-1">
                                                            <a href="{{ route('post', [$cat->slug, $post->id]) }}">
                                                                {{ $post->title }}
                                                            </a>
                                                        </h2>
                                                        <div class="news__subtitle">
                                                            {{ $post->description }}
                                                        </div>
                                                        <div class="my-border">
                                                            <div class="news__dates--two">
                                                                <div class="news__date mr-1">02 апреля</div>
                                                                <!--<div class="news__category--title">• gazeta.uz</div>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
{{--                            @endforeach--}}

                            <div class="col-md-12 my-pagination">
                                <nav>
                                    <ul class="pagination">

                                        <li class="page-item disabled" aria-disabled="true"
                                            aria-label="pagination.previous">
                                            <span class="page-link" aria-hidden="true"><i
                                                    class="fas fa-chevron-left"></i></span>
                                        </li>

                                        <li class="page-item active" aria-current="page"><span
                                                class="page-link">1</span></li>
                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/category/view/5/world?page=2">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/category/view/5/world?page=3">3</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/category/view/5/world?page=4">4</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/category/view/5/world?page=5">5</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/category/view/5/world?page=6">6</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/category/view/5/world?page=7">7</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/category/view/5/world?page=8">8</a>
                                        </li>

                                        <li class="page-item disabled" aria-disabled="true"><span
                                                class="page-link">...</span></li>

                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/category/view/5/world?page=70">70</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/category/view/5/world?page=71">71</a>
                                        </li>


                                        <li class="page-item">
                                            <a class="page-link"
                                               href="https://solanews.uz/ru/category/view/5/world?page=2" rel="next"
                                               aria-label="pagination.next"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>

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
