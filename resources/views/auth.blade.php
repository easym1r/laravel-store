@extends('layouts.main')

@section ('title', 'Магазин "Постелька". Контакты')

@section('content')

    <!--================login_part Area =================-->
    <section class="login_part">
        <div class="container">
            <div class="row padding_top">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Для использования данной функции <br>необходимо иметь аккаунт!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>У вас нет аккаунта?</h2>
                            <a href="{{ route('register') }}" class="btn_3">Создать аккаунт</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 d-flex justify-content-center">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>У вас уже есть аккаунт?</h2>
                            <a href="{{ route('login') }}" class="btn_3">Войти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

@endsection
