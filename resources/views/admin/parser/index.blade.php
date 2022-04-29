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
                    <th>Заголовок</th>
                    <th>Ссылка</th>
                    <th>Описание</th>
                    <th>Дата</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <body>
                @forelse ($newsList as $news)
                    <tr>
                        <td class="title">{{ $news['title'] }}</td>
                        <td class="link">{{ $news['link'] }}</td>
                        <td class="description">{{ $news['description'] }}</td>
                        <td>@if($news['pubDate']) {{ $news['pubDate'] }} @endif</td>
                        <td>
                            <a href="javascript:;" class="add">Добавить</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Записей нет</td></tr>
                @endforelse
            </body>
        </table>
    </div>

    <form action="{{ route('admin.news.store') }}" method="post" class="formAddItem">
        @csrf
        <input type="hidden" name="category_id" value="1">
        <input type="hidden" name="title" value="">
        <input type="hidden" name="author" value="yandex">
        <input type="hidden" name="image" value="">
        <input type="hidden" name="status" value="ACTIVE">
        <input type="hidden" name="description" value="">
        <input type="hidden" name="link" value="">
    </form>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".add");
            el.forEach(function(element, index) {
                element.addEventListener("click", function() {
                    let item = this.parentElement.parentElement;
                    let formAddItem = document.querySelector(".formAddItem");

                    formAddItem.querySelector("input[name=title]").value = item.querySelector("td.title").textContent;
                    formAddItem.querySelector("input[name=link]").value = item.querySelector("td.link").textContent;
                    formAddItem.querySelector("input[name=description]").value = item.querySelector("td.description").textContent;

                    formAddItem.submit();
                });
            });
        });
    </script>
@endpush