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
    <x-alert type="danger" message="Сообщение об ошибке"/>
    <x-alert type="success" message="Сообщение"/>
    <x-alert type="info" message="Информационное сообщение"/>
@endsection