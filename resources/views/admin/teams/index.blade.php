@extends('layouts.admin')

@section('breadcrumb')
    <li class="active">Команды</li>
@endsection

@section('content')

    <a href="{{ route('admin.teams.create') }}" type="button" class="btn bg-primary">
        Добавить
        <i class="icon-stack-plus position-right"></i>
    </a>

    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr class="border-solid">
                <th>#</th>
                <th>Название</th>
                <th>Alias</th>
                <th>Обновлена</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <td><span class="label label-primary">{{ $loop->iteration }}</span></td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->alias }}</td>
                    <td><span class="label label-primary">{{ $team->updated_at->diffForHumans() }}</span></td>
                    <td>
                        <div>
                            <a href="{{ route('admin.teams.edit', $team) }}"><i class="icon-pencil7"></i></a>
                            <form method="POST" action="{{ route('admin.teams.destroy', $team) }}" class="form__delete">
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