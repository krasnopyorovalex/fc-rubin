@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.games.index') }}">Матчи</a></li>
    <li class="active">Форма добавления</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.games.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                @input(['name' => 'name', 'label' => 'Название'])
                            </div>
                            <div class="col-md-3">
                                <label for="started_at">Дата проведения:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                    <input type="text" class="form-control" id="started_at" value="{{ old('started_at') }}" name="started_at">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="started_time_at">Время начала:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="icon-watch2"></i></span>
                                    <input type="text" class="form-control" id="started_time_at" value="{{ old('started_time_at') }}" name="started_time_at">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                @select(['name' => 'team_first_id', 'label' => 'Первая команда', 'items' => $teams])
                            </div>
                            <div class="col-md-3">
                                @select(['name' => 'team_second_id', 'label' => 'Вторая команда', 'items' => $teams])
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        @input(['name' => 'title', 'label' => 'Title'])
                        @input(['name' => 'description', 'label' => 'Description'])

                        @input(['name' => 'alias', 'label' => 'Alias'])
                        @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @textarea(['name' => 'preview', 'label' => 'Превью', 'id' => 'editor-full2'])
                        @textarea(['name' => 'text', 'label' => 'Текст'])

                        @submit_btn()
                    </div>
                </div>
            </form>

        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/ui/moment/moment.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/pickers/daterangepicker.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/plugins/pickers/anytime.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/pages/picker_date.js') }}"></script>
    @endpush
@endsection
