@extends('layouts.admin')
@section('title') Добавление источника @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление источника</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    @include('inc.messages')
    <form action="{{ route('admin.sites.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Наименование</label>
            <input type="text" class="form-control @if($errors->has('title')) alert-danger @endif" name="title" id="title" value="{{ old('title') }}">
            @error('title') <strong style="color: red">{{ $message }}</strong> @enderror
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">url</label>
            <input type="text" class="form-control @if($errors->has('url')) alert-danger @endif" name="url" id="url" value="{{ old('url') }}">
            @error('url') <strong style="color: red">{{ $message }}</strong> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="description" rows="3">{!! old('description') !!}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>
@endsection