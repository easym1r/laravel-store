@extends('layouts.main')

@section ('title', 'Магазин "Постелька". Контакты')

@section('content')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Товары в корзине</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

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
                            <th scope="col" colspan="2">Количество</th>
                            <th scope="col">Общая стоимость</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartInfo['cartProducts'] as $product)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="/img/product/{{ $product['image_file_name'] }}" alt=""/>
                                        </div>
                                        <div class="media-body">
                                            <a href="/product/{{ $product['id'] }}"><p>{{ $product['name'] }}</p></a>
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
                                        <input class="input-number" type="number" value="{{ $product['quantity'] }}"
                                               min="1" max="10"
                                               id="quantity-product-{{ $product['position_in_cart'] }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="cupon_text float-right">
                                        <a class="btn_1 update-quantity-btn"
                                           data-product-position-in-cart="{{ $product['position_in_cart'] }}" href="#">Обновить
                                            количество</a>
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
                            <td></td>
                            <td>
                                <h5 class="float-right">Общая стоимость</h5>
                            </td>
                            <td>
                                <h5>{{ $cartInfo['cartPrice'] }} ₽</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ route('products') }}">Продолжить покупки</a>
                        <a class="btn_1 checkout_btn_1" href="#">Оформить заказ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

    <!-- JavaScript-код для обработки нажатия кнопки "Обновить количество" и отправки AJAX-запроса -->
    <script> // TODO временно скрипт оформлен здесь! FIXME Нужно унести в отдельный JS-файл + добавить чтобы поле было от 1 до 10 !!!
        $('.update-quantity-btn').on('click', function () {
            const productCartIdPosition = $(this).data('product-position-in-cart');
            const productQuantity = $('#quantity-product-' + productCartIdPosition).val();

            $.ajax({
                url: '{{ route('cartUpdate') }}',
                method: 'POST',
                data: {
                    productCartIdPosition,
                    productQuantity
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data);
                    window.location.href = '{{ route('cart') }}';
                    // FIXME добавить обработку кастомной ошибки от контроллера корзины
                },
                error: (data) => {
                    if (data.status === 401) {
                        window.location.href = '{{ route('auth') }}';
                    } else {
                        console.log(data);
                    }
                }
            });
        });
    </script>

@endsection
