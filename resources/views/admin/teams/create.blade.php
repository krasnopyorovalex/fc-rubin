@extends('layouts.admin')

@section('breadcrumb')
    <li><a href="{{ route('admin.teams.index') }}">Команды</a></li>
    <li class="active">Форма добавления</li>
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Форма добавления</div>

        <div class="panel-body">

            @include('layouts.partials.errors')

            <form action="{{ route('admin.teams.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @select(['name' => 'gallery_id', 'label' => 'Галерея', 'items' => $galleries])

                @input(['name' => 'name', 'label' => 'Название'])
                @input(['name' => 'city', 'label' => 'Населенный пункт'])
                @input(['name' => 'title', 'label' => 'Title'])
                @input(['name' => 'description', 'label' => 'Description'])
                @input(['name' => 'alias', 'label' => 'Alias'])

                @imageInput(['name' => 'image', 'type' => 'file', 'label' => 'Выберите изображение на компьютере'])

                @textarea(['name' => 'text', 'label' => 'Текст'])

                @submit_btn()
            </form>

        </div>
    </div>
@push('scripts')
<script src="{{ asset('dashboard/ckeditor/ckeditor.js') }}"></script>
@endpush
@endsection
