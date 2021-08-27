@extends('layouts.app')

@section('title', 'Галерея. ' . $gallery->name)
@section('description',  'Галерея. ' . $gallery->description)
@push('og')
    <meta property="og:title" content="{{ $gallery->name }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($gallery->image ? $gallery->image->path : 'images/logo.png') }}">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li><a href="{{ route('page.show') }}">Главная</a></li>
                        <li><a href="{{ route('page.show',['alias' => 'gallery']) }}">Галерея</a></li>
                        <li>{{ $gallery->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 flex-start">
                    <div class="content page__content galleries">
                        <h1>{{ $gallery->name }}</h1>
                        <div class="row">
                            @foreach ($gallery->images as $image)
                                <div class="col-md-3">
                                    <a href="{{ $image->getPath() }}" class="lightbox">
                                        <img src="{{ $image->getThumb() }}" alt="{{ $image->alt }}" title="{{ $image->title }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
