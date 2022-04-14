@extends('layouts.admin')
@section('title') Редактирование новости @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование новости {{ $site->id }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    @include('inc.messages')
    <form action="{{ route('admin.sites.update', ['site' => $site]) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Наименование</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $site->title }}">
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control" name="url" id="url" value="{{ $site->url }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="description" rows="3">{!! $site->description !!}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Изменить</button>
    </form>
@endsection