@extends('layouts.master')
@section('title', $tag['name'])

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
                                            class="catalogBtn__item @if(Route::current()->tag == $tagItem->name) active @endif">
                                            <a class="mybtn mybtn__green" href="{{ route('tag', $tagItem->name) }}">
                                                {{ $tagItem->name }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 my-3">
                                <div
                                    class="d-flex align-items-md-center justify-content-between flex-md-row flex-column">
                                    <h1 class="section__title">{{ $tag->name }}</h1>

                                    {{--Tab-start--}}
                                    <section class="section-filter">
                                        <ul class="nav mb-3 filter">
                                            <li class="nav-item filter__item"><a class="active" data-toggle="tab" href="#home">Последние</a></li>
                                            <li class="filter__item"><a class="" data-toggle="tab" href="#menu1">Популярные</a></li>
                                        </ul>
                                    </section>
                                    {{--Tab-end--}}

                                </div>
                            </div>

                            <div class="col-md-12 col-lg-6 my-2">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        11111
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        2222
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12  my-pagination">
                                <nav>
                                    <ul class="pagination">

                                        <li class="page-item disabled" aria-disabled="true"
                                            aria-label="pagination.previous">
                                            <span class="page-link" aria-hidden="true"><i
                                                    class="fas fa-chevron-left"></i></span>
                                        </li>

                                        <li class="page-item active" aria-current="page"><span
                                                class="page-link">1</span></li>

                                        <li class="page-item disabled" aria-disabled="true"><span
                                                class="page-link">...</span></li>

                                        <li class="page-item"><a class="page-link"
                                                                 href="https://solanews.uz/ru/tags/view/1/7/finansy/new?page=25">25</a>
                                        </li>


                                        <li class="page-item">
                                            <a class="page-link"
                                               href="https://solanews.uz/ru/tags/view/1/7/finansy/new?page=2" rel="next"
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
