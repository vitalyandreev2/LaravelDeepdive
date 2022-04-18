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
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->category->title }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->author }}</td>
                        <td>{{ $news->status }}</td>
                        <td>{{ $news->description }}</td>
                        <td>{{ $news->image }}</td>
                        <td>@if($news->updated_at) {{ $news->updated_at->format('d-m-Y H.i') }} @endif</td>
                        <td>
                            <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Ред.</a>
                            <a href="javascript:;" class="delete" rel="{{ $news->id }}">Удал.</a>
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

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            el.forEach(function(element, index) {
                element.addEventListener("click", function() {
                    const id = this.getAttribute("rel");
                    if(confirm(`Удалить запись с #ID ${id} ?`)) {
                        send(`/admin/news/${id}`).then(() => {
                            alert('Запись была удалена');
                            location.reload();
                        });
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush