@extends('layouts.admin')
@section('title') Добавление категории @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление категории</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"/>
        @endforeach
    @endif
    <form action="" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Наименование</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>
@endsection