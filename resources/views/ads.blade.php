@extends('layouts.master')
@section('title', 'Реклама')

@section('content')
    <main id="app">
        <section class="section-news-item">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-md-9 col-lg-8">
                        <div class="row">
                            <!-- News item -->
                            <div class="col-12 my-2">
                                <div class="news news__item news__top">
                                    <h1 class="news__title--big mt-1 mb-3">
                                        <a href="#">
                                            @lang("ads")
                                        </a>
                                    </h1>

                                    <div class="news__content mt-2 border-bottom pb-3 pb-md-3">
                                        <div class="news__subtitle">
                                            <p>@lang("ads_long"): <br>@lang("write"): info@sola.uz; <br>@lang("call"): (71) 207-08-06</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rek -->
                            <div class="col-6 my-2">
                                <div class="rek h-100">
                                    <div class="rek__vertical">
                                        <div id="yandex_rtb_R-A-583185-13"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 my-2">
                                <div class="rek h-100">
                                    <div class="rek__vertical">
                                        <div id="yandex_rtb_R-A-583185-17"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Rek -->
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <div id="yandex_rtb_R-A-583185-8"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rek -->
            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <div id="yandex_rtb_R-A-583185-13"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
