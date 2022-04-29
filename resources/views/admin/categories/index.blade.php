@extends('layouts.admin')
@section('title') Список категорий @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Категории</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
            </div>
        </div>
    </div>
    @include('inc.messages')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Кол-во новостей</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Опции</th>
                </tr>
            </thead>
            <body>
                @forelse ($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->news_count }}</td>
                        <td>{{ $cat->title }}</td>
                        <td>{{ $cat->description }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['category' => $cat]) }}">Ред.</a>
                            <a href="javascript:;" class="delete" rel="{{ $cat->id }}">Удал.</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Записей нет</td></tr>
                @endforelse
            </body>
        </table>
    </div>

    {{ $categories->links() }}

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const el = document.querySelectorAll(".delete");
            el.forEach(function(element, index) {
                element.addEventListener("click", function() {
                    const id = this.getAttribute("rel");
                    if(confirm(`Удалить запись с #ID ${id} ?`)) {
                        send(`/admin/categories/${id}`).then(() => {
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