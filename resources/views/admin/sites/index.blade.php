@extends('layouts.admin')
@section('title') Список источников @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список источников</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.sites.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить источник</a>
            </div>
        </div>
    </div>
    @include('inc.messages')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Источник</th>
                    <th>Описание</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <body>
                @forelse ($sitesList as $site)
                    <tr>
                        <td>{{ $site->id }}</td>
                        <td>{{ $site->title }}</td>
                        <td>{{ $site->url }}</td>
                        <td>{{ $site->description }}</td>
                        <td>
                            <a href="{{ route('admin.sites.edit', ['site' => $site->id]) }}">Ред.</a>
                            <a href="">Удал.</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Записей нет</td></tr>
                @endforelse
            </body>
        </table>
    </div>

    {{ $sitesList->links() }}

@endsection