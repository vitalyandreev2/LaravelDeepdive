@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>
    @include('inc.messages')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Категория</th>
                    <th>Заголовок</th>
                    <th>Автор</th>
                    <th>Статус</th>
                    <th>Описание</th>
                    <th>картинка</th>
                    <th>Дата редактирования</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <body>
                @forelse ($newsList as $news)
                    <tr>
                        <td>{{ $news->id }}</td>barryvdh/laravel-debugbar –dev
                        <td>{{ $news->category->title }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->author }}</td>
                        <td>{{ $news->status }}</td>
                        <td>{{ $news->description }}</td>
                        <td>{{ $news->image }}</td>
                        <td>@if($news->updated_at) {{ $news->updated_at->format('d-m-Y H.i') }} @endif</td>
                        <td>
                            <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Ред.</a>
                            <a href="">Удал.</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Записей нет</td></tr>
                @endforelse
            </body>
        </table>
    </div>

    {{ $newsList->links() }}

@endsection