@extends('layouts.app')

@section('title', $catalog->title)
@section('description', $catalog->description)
@push('og')
    <meta property="og:title" content="{{ $catalog->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($catalog->image ? $catalog->image->path : 'images/logo.png') }}">
    <meta property="og:description" content="{{ $catalog->description }}">
    <meta property="og:site_name" content="Футбольный клуб Рубин-Ялта">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('page.show') }}">Главная</a></li>
                    <li><a href="{{ route('page.show', ['alias' => 'catalog']) }}">Каталог</a></li>
                    <li>{{ $catalog->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <main>
        <section class="well2 bg-light page__content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{ $catalog->name }}</h1>

                        @if($products)
                            <div class="row project__box">
                                @foreach($products as $product)
                                    <div class="col-md-4">
                                        <div class="project" itemscope itemtype="http://schema.org/ImageObject">
                                            @if($product->image)
                                                <figure>
                                                    <a href="{{ $product->url }}">
                                                        <img src="{{ asset($product->image->path) }}" alt="{{ $product->image->alt }}" title="{{ $product->image->title }}" itemprop="contentUrl">
                                                    </a>
                                                </figure>
                                            @endif
                                            <div class="desc">
                                                <div class="name">
                                                    <a href="{{ $product->url }}" itemprop="name">{{ $product->name }}</a>
                                                </div>
                                                <div class="button-wrap">
                                                    <a href="{{ $product->url }}" class="btn2 btn2__color_mod">Подробнее</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        {!! $catalog->text !!}
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
