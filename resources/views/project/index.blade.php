@extends('layouts.app')

@section('title', $project->title)
@section('description', $project->description)
@push('og')
    <meta property="og:title" content="{{ $project->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($project->image ? $project->image->path : 'images/logo.png') }}">
    <meta property="og:description" content="{{ $project->description }}">
    <meta property="og:site_name" content="Футбольный клуб Рубин-Ялта">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('page.show') }}">Главная</a></li>
                    <li><a href="{{ route('page.show', ['alias' => 'projects']) }}">Проекты</a></li>
                    <li>{{ $project->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <main>
        <section class="well2 bg-light page__content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @include('layouts.partials.arrow_back')
                        <h1>{{ $project->name }}</h1>
                        {!! $project->text !!}
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
