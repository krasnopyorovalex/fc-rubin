@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@push('og')
    <meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($page->image ? $page->image->path : 'images/logo.png') }}">
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="Компания LLC CERNEL INDASTRIS GROUP">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('page.show') }}">Главная</a></li>
                    <li>{{ $page->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <main>
        <section class="well2 bg-light page__content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{ $page->name }}</h1>
                        {!! $page->text !!}

                        <ul class="contact-list row">
                            <li class="col-md-4 col-sm-6 col-xs-12">
                                <div class="fa fa-envelope"></div>
{{--                                <a href="mailto:lloydcg.uk@gmail.com">--}}
{{--                                    <span>lloydcg.uk@gmail.com</span>--}}
{{--                                </a>--}}
                            </li>
                            <li class="col-md-4 col-sm-6 col-xs-12">
                                <div class="fa fa-mobile"></div>
{{--                                <div class="phone-item">--}}
{{--                                    <a href="tel:+359876092441">+35 987 609 24 41</a>--}}
{{--                                </div>--}}
                            </li>
                            <li class="col-md-4 col-sm-12 col-xs-12">
                                <div class="fa fa-map-marker"></div>
                                <address>298612, Крым респ, г. Ялта, Садовая ул, дом 5В , корпус Литер А, помещение 2</address>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="contacts-map">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Af9036f85afbdd2973f68b47294f38ccb87088d7541f50526e60eadf685237f27&amp;source=constructor" width="100%" height="480" frameborder="0"></iframe>
    </div>
@endsection
