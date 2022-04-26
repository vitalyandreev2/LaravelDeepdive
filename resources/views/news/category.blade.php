@extends('layouts.main')
@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-3">
    @foreach ($newsList as $news)
    <div class="col">
        <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" src="{{ $news->image }}" alt="{{ $news->title }}">
            <div class="card-body">
                <h4 class="title">{{ $news->title }}</h4>
                <p class="card-text">{!! $news->description !!}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('news.show', ['id' => $news->id, 'idCategory' => $news->category_id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                    </div>
                    <small class="text-muted">{{ $news->status }}: {{ $news->author }}</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $newsList->links() }}

@endsection