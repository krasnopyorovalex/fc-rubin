@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Матчи</li>
@endsection

@section('content')

    <a href="{{ route('admin.games.create') }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Название</th>
                <th>Дата начала</th>
                <th>Команда 1</th>
                <th>Команда 2</th>
                <th>Alias</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>{{ $game->name }}</td>
                    <td>
                        <span class="label label-primary">{{ $game->started_at ?: 'Не определено' }}</span>
                        <span class="label label-primary">{{ $game->getStartedTime() }}</span>
                    </td>
                    <td>{{ $game->teamFirst ? $game->teamFirst->name : 'Не определено' }}</td>
                    <td>{{ $game->teamSecond ? $game->teamSecond->name : 'Не определено' }}</td>
                    <td>{{ $game->alias }}</td>
                    <td>
                        <div>
                            <a href="{{ route('admin.games.edit', $game) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.games.destroy', $game) }}" class="form__delete">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="last__btn">
                                    <i class="icon-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
