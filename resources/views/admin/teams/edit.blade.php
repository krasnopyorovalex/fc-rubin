@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.teams.index') }}">Команды</a></li>
    <li class="active">Форма редактирования</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.teams.update', ['id' => $team->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">

                            <div class="row">
                                <div class="col-md-9">
                                    @input(['name' => 'name', 'label' => 'Название', 'entity' => $team])
                                    @input(['name' => 'city', 'label' => 'Населенный пункт', 'entity' => $team])
                                    @input(['name' => 'title', 'label' => 'Title', 'entity' => $team])
                                    @input(['name' => 'description', 'label' => 'Description', 'entity' => $team])

                                    @input(['name' => 'alias', 'label' => 'Alias', 'entity' => $team])
                                </div>
                                <div class="col-md-3">
                                    @select(['name' => 'gallery_id', 'label' => 'Галерея', 'items' => $galleries, 'entity' => $team])
                                    @if ($team->image)
                                        <div class="panel panel-flat border-blue border-xs" id="image__box">
                                            <div class="panel-body">
                                                <img src="{{ asset($team->image->path) }}" alt="" class="upload__image team-img">

                                                <div class="btn-group btn__actions">
                                                    <button data-toggle="modal" data-target="#modal_info" type="button" class="btn btn-primary btn-labeled btn-sm"><b><i class="icon-pencil4"></i></b> Атрибуты</button>

                                                    <button type="button" data-href="{{ route('admin.images.destroy', ['id' => $team->image->id]) }}" class="btn delete__img btn-danger btn-labeled btn-labeled-right btn-sm">Удалить <b><i class="icon-trash"></i></b></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @imageInput(['name' => 'image', 'type' => 'file', 'entity' => $team, 'label' => 'Выберите изображение на компьютере'])
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    @textarea(['name' => 'text', 'label' => 'Текст', 'entity' => $team])
                                    @submit_btn()
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
    @if ($team->image)
        @include('layouts.partials._image_attributes_popup', ['image' => $team->image])
    @endif

@push('scripts')
<script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
@endpush
@endsection
