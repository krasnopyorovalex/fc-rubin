@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@push('og')
    <meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($page->image ? $page->image->path : 'images/logo.png') }}">
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="Футбольный клуб Рубин-Ялта">
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
                        @if($page->gallery)
                        <div class="gallery-box">
                            <h3>{{ $page->gallery->name }}</h3>
                            <div class="row">
                                @foreach ($page->gallery->images as $image)
                                    <div class="col-md-3">
                                        <a href="{{ $image->getPath() }}" class="lightbox">
                                            <img src="{{ $image->getThumb() }}" alt="{{ $image->alt }}" title="{{ $image->title }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
