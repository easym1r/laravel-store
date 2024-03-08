@extends('layouts.main')

@section ('title', 'Магазин "Постелька". Продукты')

@section('content')

    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Полный список наших продуктов</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product_list">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-sm-4">
                                    <div class="single_product_item">
                                        <img src="/img/product/{{ $product->image_file_name }}" alt="#" class="img-fluid">
                                        <h3><a href="/product/{{ $product->id }}">{{ $product->name }}</a></h3>
                                        <p>{{ $product->price }} ₽</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

@endsection
