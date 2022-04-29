@extends('layouts.main')
@section('content')
<h1>Обратная связь</h1>

@if (session('success'))
    <x-alert type="success" message="{{ session('success') }}"/>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <x-alert type="danger" :message="$error"/>
    @endforeach
@endif

<form action="{{ route('feedback.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Имя пользователя</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Комментарий</label>
        <textarea class="form-control" name="comment" id="comment" rows="3">{!! old('comment') !!}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Отправить</button>
</form>
@endsection