@extends('layouts.main')

@section ('title', 'Магазин "Постелька". Подробно о продукте')

@section('content')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="product_img_slide owl-carousel">
                        <div class="single_product_img">
                            <img src="/img/product/{{ $product->image_file_name }}" alt="#" class="img-fluid">
                        </div>
                        <div class="single_product_img">
                            <img src="/img/product/{{ $product->image_file_name }}" alt="#" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="single_product_text text-center">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <div class="card_area">
                            <div class="product_count_area">
                                <p>Количество</p>
                                <div class="product_count d-inline-block">
                                    <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                    <input class="product_count_item input-number" type="text" value="1" min="1"
                                           max="10">
                                    <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                </div>
                                <p>{{ $product->price }}</p>
                            </div>
                            <div class="add_to_cart">
                                <a class="btn_3 add-to-cart-btn" style="cursor: pointer">Добавить товар в корзину</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!-- JavaScript-код для обработки нажатия кнопки "Добавить товар в корзину" и отправки AJAX-запроса -->
    <script> // TODO временно скрипт оформлен здесь! FIXME Нужно унести в отдельный JS-файл
        $(document).ready(function () {
            $('.add-to-cart-btn').click(function (event) {
                event.preventDefault()
                addToCart()
            })
        })

        function addToCart() {
            let id = {{ $product->id }};
            var quantity = $('.input-number').val();

            $.ajax({
                url: "{{ route('addToCart') }}",
                type: "POST",
                data: {
                    id: id,
                    quantity: quantity,
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
        }
    </script>

@endsection
