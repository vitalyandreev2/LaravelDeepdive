@extends('layouts.admin')
@section('title') Добавление новости @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    @include('inc.messages')
    <form action="{{ route('admin.news.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id === old('$category->id')) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Наименование</label>
            <input type="text" class="form-control @if($errors->has('title')) alert-danger @endif" name="title" id="title" value="{{ old('title') }}">
            @error('title') <strong style="color: red">{{ $message }}</strong> @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Автор</label>
            <input type="text" class="form-control @if($errors->has('author')) alert-danger @endif" name="author" id="author" value="{{ old('author') }}">
            @error('author') <strong style="color: red">{{ $message }}</strong> @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="mb-3"> 
            <label for="status" class="form-label">Статус</label>
            <select class="form-control" name="status" id="status">
                <option value="DRAFT" @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                <option value="ACTIVE" @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                <option value="BLOCKED" @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control" name="description" id="description" rows="3">{!! old('description') !!}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>
@endsection