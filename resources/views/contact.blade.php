@extends('layouts.main')

@section ('title', 'Магазин "Постелька". Контакты')

@section('content')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Информация для связи с нами</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="map"></div>
                <script type="text/javascript" charset="utf-8" async
                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3f3d4f8a236dda3ffbcb675e1bd936e97f77f91ec4fadd67d7021cfd5697576f&amp;width=1180&amp;height=480&amp;lang=ru_RU&amp;scroll=true">
                </script>
            </div>


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Свяжитесь с нами</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
                          novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter Subject'"
                                           placeholder='Введите тему письма'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                              onfocus="this.placeholder = ''"
                                              onblur="this.placeholder = 'Enter Message'"
                                              placeholder='Введите ваше сообщение'></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text"
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter your name'" placeholder='Введите ваше имя'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Enter email address'"
                                           placeholder='Введите адрес вашей электроной почты'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <a href="#" class="btn_3 button-contactForm">Отправить сообщение</a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Тогучин, Россия</h3>
                            <p>улица Комсомольская, дом 3</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>9 (999) 9999 999</h3>
                            <p>Режим работы: с ПН по ПТ, 9:00 - 18:00</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>support@localhost.com</h3>
                            <p>Присылайте нам свои запросы в любое время!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
