@extends('layouts.main')

@section ('title', 'Магазин "Постелька". Контакты')

@section('content')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Ваши заказы</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Checkout Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">Номер заказа</th>
                            <th scope="col" class="text-center">Список товаров в заказе</th>
                            <th scope="col" class="text-center">Общая стоимость заказа</th>
                            <th scope="col" class="text-center">Статус заказа</th>
                            <th scope="col" colspan="2" class="text-center">Действия с заказом</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($orderList->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h5>У вас отсутствуют оформленные заказы</h5>
                                </td>
                            </tr>
                        @endif
                        @foreach($orderList as $order)
                            <tr>
                                <td>
                                    <h5 class="text-center">{{ $order->id }}</h5>
                                </td>
                                <td>
                                    <h5 class="text-center">{{ $order->products_in_order }}</h5>
                                </td>
                                <td>
                                    <h5 class="text-center">{{ $order->order_cost }} ₽</h5>
                                </td>
                                <td>
                                    <h5 class="text-center">{{ $order->status }}</h5>
                                </td>
                                <td>
                                    <a class="btn btn-success confirm-btn" data-order-id="{{ $order->id }}" href="#">Подтвердить</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger delete-btn" data-order-id="{{ $order->id }}" href="#">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h5 class="float-right">Стоимость всех заказов</h5>
                            </td>
                            <td>
                                <h5 class="text-center">{{ $totalOrderPrice }} ₽</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ route('products') }}">Вернуться к покупкам</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <script> // TODO временно скрипт оформлен здесь! FIXME Нужно унести в отдельный JS-файл
        // Обработка кнопки "удалить" заказ
        $('.delete-btn').on('click', function () {
            const orderId = $(this).data('order-id');

            $.ajax({
                url: '{{ route('orderDelete') }}',
                method: 'POST',
                data: {
                    orderId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data);
                    window.location.href = '{{ route('order') }}';
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

        // Обработка кнопки "подтвердить" заказ
        $('.confirm-btn').on('click', function () {
            const orderId = $(this).data('order-id');

            $.ajax({
                url: '{{ route('orderConfirm') }}',
                method: 'POST',
                data: {
                    orderId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    console.log(data);
                    window.location.href = '{{ route('order') }}';
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
