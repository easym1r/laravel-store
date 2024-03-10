@extends('layouts.main')

@section ('title', 'Магазин "Постелька". Главная')

@section('content')

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Подушки лучшего качества</h1>
                            <p>Способны подарить вам качество лучшей жизни!</p>
                            <a href="{{ route('products') }}" class="btn_1">Выбрать товар</a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="banner_img">
            <img src="/img/banner.png" alt="#" class="img-fluid">
            <img src="/img/banner_pattern.png " alt="#" class="pattern_img img-fluid">
        </div>
    </section>
    <!-- banner part start-->

    <!-- product list start-->
    <section class="single_product_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="/img/single_product_1.png" class="img-fluid" alt="#">
                                    <img src="/img/product_overlay.png" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>От 999 рублей</h5>
                                    <h2><a href="{{ route('products') }}">Современные чехлы для подушки с принтом из пены с памятью</a></h2>
                                    <a href="{{ route('products') }}" class="btn_3">Посмотреть продукцию сейчас</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list end-->


    <!-- trending item start-->
    <section class="trending_items">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Популярные товары</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($popularProducts as $product)
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_product_item">
                            <div class="single_product_item_thumb">
                                <img src="/img/product/{{ $product->image_file_name }}" alt="#" class="img-fluid">
                            </div>
                            <h3><a href="product/{{ $product->id }}">{{ $product->name }}</a></h3>
                            <p>{{ $product->price }} ₽</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- trending item end-->

    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="/img/client/client_1.png" alt="#">
                            </div>
                            <p>"Покупаю продукцию уже пару лет подряд! Моя шея в восторге!"</p>
                            <h5>- Иван Иванов</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="/img/client/client_2.png" alt="#">
                            </div>
                            <p>"Понял для себя, что с подушками от данного продавца я сплю крепче! От чего качество моей жизни явно улучшилось!"</p>
                            <h5>- Петр Сидоренко</h5>
                        </div>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="/img/client/client_3.png" alt="#">
                            </div>
                            <p>"А я просто оставлю коммент, вдруг кто его увидет !)"</p>
                            <h5>- Администратор</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->


    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Наши преимущества</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="/img/icon/feature_icon_1.svg" alt="#">
                        <h4>Оплата в рассрочку</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="/img/icon/feature_icon_2.svg" alt="#">
                        <h4>Онлайн заказ</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="/img/icon/feature_icon_3.svg" alt="#">
                        <h4>Бесплатная доставка</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="/img/icon/feature_icon_4.svg" alt="#">
                        <h4>Подарки при покупках</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->

@endsection
