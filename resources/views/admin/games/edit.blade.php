@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.games.index') }}">Матчи</a></li>
    <li class="active">Форма редактирования</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма редактирования</div>

        <div class="panel-body">

            @include('layouts.partials.errors')
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                        <li><a href="#images" data-toggle="tab">Фотографии матча</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="main">
                            <form action="{{ route('admin.games.update', ['id' => $game->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @input(['name' => 'name', 'label' => 'Название', 'entity' => $game])
                                        </div>
                                        <div class="col-md-3">
                                            <label for="started_at">Дата проведения:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                                <input type="text" class="form-control" id="started_at" value="{{ old('started_at', date('Y-m-d', strtotime($game->started_at))) }}" name="started_at">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="started_time_at">Время начала:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                                <input type="text" class="form-control" id="started_time_at" value="{{ old('started_time_at', $game->started_time_at) }}" name="started_time_at">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            @select(['name' => 'team_first_id', 'label' => 'Первая команда', 'items' => $teams, 'entity' => $game])
                                        </div>
                                        <div class="col-md-3">
                                            @select(['name' => 'team_second_id', 'label' => 'Вторая команда', 'items' => $teams, 'entity' => $game])
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                    @input(['name' => 'title', 'label' => 'Title', 'entity' => $game])
                                    @input(['name' => 'description', 'label' => 'Description', 'entity' => $game])

                                    @input(['name' => 'alias', 'label' => 'Alias', 'entity' => $game])
                                </div>
                                <div class="col-md-4">
                                    @if ($game->image)
                                        <div class="panel panel-flat border-blue border-xs" id="image__box">
                                            <div class="panel-body">
                                                <img src="{{ asset($game->image->path) }}" alt="" class="upload__image">

                                                <div class="btn-group btn__actions">
                                                    <button data-toggle="modal" data-target="#modal_info" type="button" class="btn btn-primary btn-labeled btn-sm"><b><i class="icon-pencil4"></i></b> Атрибуты</button>

                                                    <button type="button" data-href="{{ route('admin.images.destroy', ['id' => $game->image->id]) }}" class="btn delete__img btn-danger btn-labeled btn-labeled-right btn-sm">Удалить <b><i class="icon-trash"></i></b></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @imageInput(['name' => 'image', 'type' => 'file', 'entity' => $game, 'label' => 'Выберите изображение на компьютере'])
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    @textarea(['name' => 'preview', 'label' => 'Превью', 'entity' => $game, 'id' => 'editor-full2'])
                                    @textarea(['name' => 'text', 'label' => 'Текст', 'entity' => $game])

                                    @submit_btn()
                                </div>
                            </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="images">
                            <form action="#" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="gameId" value="{{ $game->id }}">
                                        <input type="hidden" name="uploadUrl" value="{{ route('admin.game_images.store', $game) }}">
                                        <input type="hidden" name="updatePositionUrl" value="{{ route('admin.game_images.update_positions') }}">
                                        <input type="file" class="file-input-ajax" multiple="multiple" name="upload">
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                            @if ($game->images)
                                <div id="_images_box">
                                    @include('admin.games._images_box')
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @if ($game->image)
        @include('layouts.partials._image_attributes_popup', ['image' => $game->image])
    @endif

    <div id="edit-image" class="modal fade"></div>
    @push('scripts')
        <script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/ui/dragula.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/extension_dnd.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/uploaders/fileinput.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/uploader_bootstrap.js') }}"></script>

        <script src="{{ asset('dashboard/assets/js/plugins/ui/moment/moment.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/pickers/daterangepicker.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/pickers/anytime.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/picker_date.js') }}"></script>
    @endpush
@endsection
