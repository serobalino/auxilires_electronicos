@extends('plantillas.invitado')
@section('titulo') Registro @endsection
@section('cuerpo')
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signup m-login--2 m-login-2--skin-2" style="background-image: url(../../../assets/app/media/img//bg/bg-2.jpg);">
            <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                <div class="m-login__container">
                    @component('componentes.invitado.logo')
                    @endcomponent
                    @component('componentes.invitado.form_registro')
                    @endcomponent
                    @component('componentes.invitado.pie')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection