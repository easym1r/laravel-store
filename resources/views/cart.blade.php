@extends('layouts.main')

@section ('title', 'Магазин "Постелька". Контакты')

@section('content')

    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Товар</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Общая стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartInfo['cartProducts'] as $product)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="/img/arrivel/arrivel_1.png" alt=""/>
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $product['name'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ $product['price'] }} ₽</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <!-- <input type="text" value="1" min="0" max="10" title="Quantity:"
                                          class="input-text qty input-number" />
                                        <button
                                          class="increase input-number-increment items-count" type="button">
                                          <i class="ti-angle-up"></i>
                                        </button>
                                        <button
                                          class="reduced input-number-decrement items-count" type="button">
                                          <i class="ti-angle-down"></i>
                                        </button> -->
                                        <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                        <input class="input-number" type="text" value="{{ $product['quantity'] }}"
                                               min="1" max="10">
                                        <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ $product['total_price'] }} ₽</h5>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <h5>Общая стоимость</h5>
                            </td>
                            <td>
                                <h5>{{ $cartInfo['cartPrice'] }} ₽</h5>
                            </td>
                        </tr>
                        <tr class="bottom_button">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="cupon_text float-right">
                                    <a class="btn_1" href="#">Обновить данные по продуктам в корзине</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="/products">Продолжить покупки</a>
                        <a class="btn_1 checkout_btn_1" href="#">Оформить заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

@endsection
