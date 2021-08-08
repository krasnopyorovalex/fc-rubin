@extends('layouts.app')

@section('title', $game->title)
@section('description', $game->description)
@push('og')
    <meta property="og:title" content="{{ $game->name }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($game->image ? $game->image->path : 'images/logo.png') }}">
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
                        <li><a href="{{ route('page.show',['alias' => 'games']) }}">Матчи</a></li>
                        <li>{{ $game->name }}</li>
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
                        <h1>{{ $game->name }}</h1>
                        {!! $game->text !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
