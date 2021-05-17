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
                                            @lang("policy")
                                        </a>
                                    </h1>

                                    <div class="news__content mt-2 border-bottom pb-3 pb-md-3">
                                        <div class="news__subtitle">
                                            @lang("policy")
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rek -->
                            <div class="col-6 my-2">
                                <div class="rek h-100">
                                    <div class="rek__vertical">
                                        <!-- Middle 1 -->
                                        <ins class="adsbygoogle"
                                             style="display:block"
                                             data-ad-client="ca-pub-3471883509518767"
                                             data-ad-slot="6531286585"
                                             data-ad-format="auto"
                                             data-full-width-responsive="true"></ins>
                                        <script>
                                            (adsbygoogle = window.adsbygoogle || []).push({});
                                        </script>
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
                                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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

            <!-- Rek -->
            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <!-- Middle 1 -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-3471883509518767"
                             data-ad-slot="6531286585"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
