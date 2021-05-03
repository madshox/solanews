@extends('layouts.master')
@section('title', 'Контакты')

@section('content')
<main id="app">
    <section class="section-contact py-4">
        <div class="container">
            <h1 class="section__title">Bog'lanish</h1>
        </div>
        <div class="my-container-fluid mt-4">
            <div class="my-map">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1498.9029941930112!2d69.25906061460928!3d41.2913267277858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8bfd74ca4815%3A0x9b659c94c50aa00a!2sSOLA!5e0!3m2!1sru!2s!4v1589453958071!5m2!1sru!2s"
                    width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""
                    aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 position-relative">
                        <div class="contact">
                            <div class="contact__title">Markaziy ofis</div>
                            <div class="contact__item">
                                <p>Telefon</p>
                                <div><a href="tel:1130">1130</a></div>
                                <div><a href="tel:+998 (71) 207 08 06">+998 (71) 207 08 06</a></div>
                            </div>
                            <div class="contact__item">
                                <p>Manzil</p>
                                <div>
                                    Toshkent sh., Shota Rustaveli ko&#039;ch., 32A
                                </div>
                            </div>
                            <div class="contact__item">
                                <p>Ish vaqti</p>
                                <div>
                                    Har kuni: 8:00 - 20:00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4 mt-3">
            <div class="feedback">
                <div class="feedback__title">Teskari aloqa</div>
                <form action="https://solanews.uz/uz/contacts/feedback" class="my-form" method="post">
                    <input type="hidden" name="_token" value="8najSOB7XfMt1emXc8tD07tKW7bqtVfRwvWkBXip">                    <div class="row">
                        <div class="col-md-4">
                            <div class="faedback__item my-3">
                                <input type="text" name="name" placeholder="Ismingiz*" required>
                            </div>
                            <div class="faedback__item my-3">
                                <input type="tel" name="phone" placeholder="Telefon*" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="feedback__item mb-3 mt-0 mt-md-3">
                                <textarea name="message" id="" cols="30" rows="5" placeholder="Xabar"></textarea>
                            </div>
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-md-end justify-content-center">
                            <button class="my-btn-send" type="submit">Yuborish</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- The Modal -->
    <div class="modal fade" id="successModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header d-flex justify-content-center position-relative">
                    <h4 class="modal-title">Rahmat!</h4>
                    <button style="right: 10px" type="button" class="close position-absolute" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-center">
                    <h5>Sizning so'rovingiz qabul qilindi</h5>
                    <p>Tez orada siz bilan bog'lanamiz</p>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
