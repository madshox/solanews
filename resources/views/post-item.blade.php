@extends('layouts.master')
@section('title', $post['title'])

@section('content')
    <main>
        <!-- News -->
        <section class="section-news-item">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-md-9 col-lg-8">
                        <div class="row">
                            <!-- News item -->
                            <div class="col-12 my-2">
                                <div class="news news__item news__top">
                                    <h1 class="news__title--big mt-1 mb-3">
                                        <a href="news-item.html">
                                            {{ $post->title }}
                                        </a>
                                    </h1>

                                    <div class="news__viewed mb-3 d-block"><i class="fas fa-eye"></i> 133</div>

                                    <div class="news__img">
                                        <a target="_blank" href="img/news_img2.png">
                                            <img class="newsImg__biggest" src="https://picsum.photos/id/21/700/400">
                                        </a>
                                        <div class="my-2 news__dates d-flex align-items-center">
                                            <div class="news__date mr-1">17 октября</div>
                                            <!-- <div class="news__time mr-1">19:00</div> -->
                                            <div class="news__category--title">• Парламентская газета</div>
                                        </div>
                                    </div>
                                    <div class="news__content mt-2 border-bottom pb-3 pb-md-3">
                                        <div class="d-flex align-items-center py-2">
                                            <div class="news__category mr-2">
                                                <span><a href="category.html">Политика</a></span>
                                                <span><a href="category.html">Законодательство</a></span>
                                                <span><a href="category.html">Спорт</a></span>
                                            </div>
                                        </div>
                                        <div class="news__subtitle">
                                            {!! $post->description !!}
                                        </div>

                                        <div class="news__external-link my-3">
                                            <a href="#">
                                                <i class="far fa-external-link"></i>
                                                <span>Источник новости</span>
                                            </a>
                                        </div>

                                        <div class="news__share my-4">
                                            <div class="share--title my-3">Поделиться:</div>
                                            <div class="share--links ml-2">
                                                <a href="#vk"><i class="fab fa-vk"></i></a>
                                                <a href="#telegram-plane"><i class="fab fa-telegram-plane"></i></a>
                                                <a href="#odnoklassniki"><i class="fab fa-odnoklassniki"></i></a>
                                                <a href="#facebook-f"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#whatsapp"><i class="fab fa-whatsapp"></i></a>
                                                <a href="#twitter"><i class="fab fa-twitter"></i></a>
                                                <a href="#instagram"><i class="fab fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Rek -->
                            <div class="col-md-6 my-2">
                                <div class="rek h-100">
                                    <div class="rek__vertical">
                                        <img src="img/rek5.png" alt="Rek">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 my-2">
                                <div class="rek h-100">
                                    <div class="rek__vertical">
                                        <img src="img/rek2.png" alt="Rek">
                                    </div>
                                </div>
                            </div>

                            <!-- Похожие публикации -->
                            <div class="col-12 py-3">
                                <div class="section__title">Похожие публикации</div>
                            </div>

                            <div class="col-md-12 col-lg-6 my-2">
                                <div class="row">
                                    <div class="col-md-5 col-lg-12">
                                        <div class="news news__bottom">
                                            <div class="news__viewed d-none d-lg-block"><i class="fas fa-eye"></i> 133
                                            </div>
                                            <div class="news__img">
                                                <a href="news-item.html">
                                                    <img class="newsImg__mini" src="https://picsum.photos/id/124/900/600">
                                                </a>
                                            </div>
                                            <div class="my-2 news__dates">
                                                <div class="news__date mr-1">17 октября</div>
                                                <!-- <div class="news__time mr-1">19:00</div> -->
                                                <div class="news__category--title">• Парламентская газета</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-12">
                                        <div class="news news__bottom">
                                            <div class="news__viewed mb-0 d-none d-md-block d-lg-none"><i
                                                    class="fas fa-eye"></i> 133</div>
                                            <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="news__category mr-2">
                                                        <span><a href="">Политика</a></span>
                                                        <span><a href="">Спорт</a></span>
                                                        <span><a href="">Технологии</a></span>
                                                    </div>
                                                </div>
                                                <h2 class="news__title--small my-1">
                                                    <a href="news-item.html">
                                                        Президент рассказал о раскрытии коррупционных
                                                    </a>
                                                </h2>
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
                            <div class="col-md-12 col-lg-6 my-2">
                                <div class="row">
                                    <div class="col-md-5 col-lg-12">
                                        <div class="news news__bottom">
                                            <div class="news__viewed d-none d-lg-block"><i class="fas fa-eye"></i> 133
                                            </div>
                                            <div class="news__img">
                                                <a href="news-item.html">
                                                    <img class="newsImg__mini" src="https://picsum.photos/id/34/900/600">
                                                </a>
                                            </div>
                                            <div class="my-2 news__dates">
                                                <!-- <div class="news__date mr-1">17 октября</div> -->
                                                <div class="news__time mr-1">19:00</div>
                                                <div class="news__category--title">• Парламентская газета</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-12">
                                        <div class="news news__bottom">
                                            <div class="news__viewed mb-0 d-none d-md-block d-lg-none"><i
                                                    class="fas fa-eye"></i> 133</div>
                                            <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="news__category mr-2">
                                                        <span><a href="">Политика</a></span>
                                                        <span><a href="">Спорт</a></span>
                                                        <span><a href="">Технологии</a></span>
                                                    </div>
                                                </div>
                                                <h2 class="news__title--small my-1">
                                                    <a href="news-item.html">
                                                        Президент рассказал о раскрытии коррупционных
                                                    </a>
                                                </h2>
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
                            <div class="col-md-12 col-lg-6 my-2">
                                <div class="row">
                                    <div class="col-md-5 col-lg-12">
                                        <div class="news news__bottom">
                                            <div class="news__viewed d-none d-lg-block"><i class="fas fa-eye"></i> 133
                                            </div>
                                            <div class="news__img">
                                                <a href="news-item.html">
                                                    <img class="newsImg__mini" src="https://picsum.photos/id/54/900/600">
                                                </a>
                                            </div>
                                            <div class="my-2 news__dates">
                                                <!-- <div class="news__date mr-1">17 октября</div> -->
                                                <div class="news__time mr-1">19:00</div>
                                                <div class="news__category--title">• Парламентская газета</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-12">
                                        <div class="news news__bottom">
                                            <div class="news__viewed mb-0 d-none d-md-block d-lg-none"><i
                                                    class="fas fa-eye"></i> 133</div>
                                            <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="news__category mr-2">
                                                        <span><a href="">Политика</a></span>
                                                        <span><a href="">Спорт</a></span>
                                                        <span><a href="">Технологии</a></span>
                                                    </div>
                                                </div>
                                                <h2 class="news__title--small my-1">
                                                    <a href="news-item.html">
                                                        Президент рассказал о раскрытии коррупционных
                                                    </a>
                                                </h2>
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
                            <div class="col-md-12 col-lg-6 my-2">
                                <div class="row">
                                    <div class="col-md-5 col-lg-12">
                                        <div class="news news__bottom">
                                            <div class="news__viewed d-none d-lg-block"><i class="fas fa-eye"></i> 133
                                            </div>
                                            <div class="news__img">
                                                <a href="news-item.html">
                                                    <img class="newsImg__mini" src="https://picsum.photos/id/43/900/600">
                                                </a>
                                            </div>
                                            <div class="my-2 news__dates">
                                                <!-- <div class="news__date mr-1">17 октября</div> -->
                                                <div class="news__time mr-1">19:00</div>
                                                <div class="news__category--title">• Парламентская газета</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-12">
                                        <div class="news news__bottom">
                                            <div class="news__viewed mb-0 d-none d-md-block d-lg-none"><i
                                                    class="fas fa-eye"></i> 133</div>
                                            <div class="news__content mt-0 mt-md-0 mt-lg-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="news__category mr-2">
                                                        <span><a href="">Политика</a></span>
                                                        <span><a href="">Спорт</a></span>
                                                        <span><a href="">Технологии</a></span>
                                                    </div>
                                                </div>
                                                <h2 class="news__title--small my-1">
                                                    <a href="news-item.html">
                                                        Президент рассказал о раскрытии коррупционных
                                                    </a>
                                                </h2>
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
                        </div>

                        <div class="my-3">
                            <button class="btn w-100 text-white bg-green my-btn__load-more">Показать еще</button>
                        </div>
                    </div>
                    <!-- Rek -->
                    <div class="col-md-3 col-lg-4 d-none d-md-block">
                        <div class="rek h-100">
                            <div class="rek__vertical sticky-top">
                                <img src="img/rek4.png" alt="Rek">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rek -->
            <div class="container rek-container">
                <div class="rek">
                    <div class="rek__big d-none d-md-block">
                        <img class="img-fluid" src="img/rek1.png" alt="Rek">
                    </div>
                    <div class="rek__vertical d-block d-md-none">
                        <img class="w-100 h-auto" src="img/rek5.png" alt="Rek">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
