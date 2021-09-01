@extends('layouts.app')

@section('title', $new->name)
@section('description', '')
@push('og')
    <meta property="og:title" content="{{ $new->name }} | Certis Capital Group LTD">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($new->image ? $new->image->path : 'images/logo.png') }}">
    <meta property="og:description" content="{{ $new->description }}">
    <meta property="og:site_name" content="Футбольный клуб Рубин-Ялта">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li><a href="{{ route('page.show') }}">Главная</a></li>
                        <li><a href="{{ route('page.show',['alias' => 'news']) }}">Новости</a></li>
                        <li>{{ $new->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 flex-start">
                    <div class="content page__content">
                        <h1>{{ $new->name }}</h1>
                        <time itemprop="datePublished" datetime="{{ $new->published_at->format('c') }}" class="article-date">
                            {{ $new->published_at->formatLocalized('%d %b %Y') }} г.
                        </time>
                        @if($new->image)
                            <img src="{{ asset($new->image->path) }}" alt="{{ $new->image->alt }}" title="{{ $new->image->title }}" class="responsive article-image">
                        @endif
                        {!! $new->text !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
