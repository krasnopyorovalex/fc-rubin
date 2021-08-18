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

    <main>
        @includeWhen($page->slider, 'layouts.sections.slider', ['slider' => $page->slider])

        <div class="matches-in-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="h2 text-primary text-center">Ближайшие матчи</div>
                        @include('layouts.shortcodes.games')
                    </div>
                </div>
            </div>
        </div>

        <section class="well2 bg-blue">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 with-table-games">
                        {!! $page->text !!}
                    </div>
                </div>
            </div>
        </section>

        @include('layouts.sections.news')

        @includeWhen(count($icons), 'layouts.sections.icons')
    </main>

@endsection
