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
                        <section class="section-games">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="section-games-item-name">
                                        {{ $game->name }}
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="section-games-item-date">
                                        <div>{{ $game->started_at->formatLocalized('%d %b %Y') }}</div>
                                        <div>{{ $game->started_time_at }}</div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="section-games-item-team">
                                        <div class="name-city">
                                            <div class="name">{{ $game->teamFirst->name }}</div>
                                            <div class="city">{{ $game->teamFirst->city }}</div>
                                        </div>
                                        <div class="image">
                                            @if($game->teamFirst->image )
                                                <img src="{{ asset($game->teamFirst->image->path) }}" alt="{{ $game->teamFirst->image->alt }}" title="{{ $game->teamFirst->image->title }}">
                                            @endif
                                        </div>
                                        <div class="image">
                                            @if($game->teamSecond->image )
                                                <img src="{{ asset($game->teamSecond->image->path) }}" alt="{{ $game->teamSecond->image->alt }}" title="{{ $game->teamSecond->image->title }}">
                                            @endif
                                        </div>
                                        <div class="name-city">
                                            <div class="name">{{ $game->teamSecond->name }}</div>
                                            <div class="city">{{ $game->teamSecond->city }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        {!! $game->text !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
