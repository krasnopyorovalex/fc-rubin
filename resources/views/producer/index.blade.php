@extends('layouts.app')

@section('title', $producer->title)
@section('description', $producer->description)
@push('og')
    <meta property="og:title" content="{{ $producer->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
    <meta property="og:image" content="{{ asset($producer->image ? $producer->image->path : 'images/logo.png') }}">
    <meta property="og:description" content="{{ $producer->description }}">
    <meta property="og:site_name" content="Футбольный клуб Рубин-Ялта">
    <meta property="og:locale" content="ru_RU">
@endpush

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs">
                    <li><a href="{{ route('page.show') }}">Главная</a></li>
                    <li>{{ $producer->name_little }}</li>
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
                        <h1 class="producer__name">{{ $producer->name }}</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            <li class="active"><a href="#about" data-toggle="tab">О торговой марке</a></li>
                            <li><a href="#projects" data-toggle="tab">Наши проекты</a></li>
                            <li><a href="#production" data-toggle="tab">Продукция</a></li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="about">{!! $producer->about !!}</div>
                            <div class="tab-pane" id="projects">
                                <div class="row project__box">
                                    @if(count($producer->projects))
                                    @foreach($producer->projects as $project)
                                        <div class="col-md-4">
                                            <div class="project">
                                                @if($project->image)
                                                    <figure>
                                                        <img src="{{ asset($project->image->path) }}" alt="{{ $project->image->alt }}" title="{{ $project->image->title }}">
                                                    </figure>
                                                @endif
                                                <div class="desc">
                                                    <div class="name">
                                                        <a href="{{ $project->url }}">{{ $project->name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane" id="production">
                                @if(count($producer->tabs))
                                <ul class="faq">
                                    @foreach($producer->tabs as $tab)
                                        <li>
                                            <div class="q">{{ $tab->name }}</div>
                                            <div class="a">
                                                {!! $tab->text !!}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! $producer->text !!}
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
