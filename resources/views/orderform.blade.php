@extends('layouts.main')
@section('content')
<h1>Форма заказа</h1>

@if (session('success'))
    <x-alert type="success" message="{{ session('success') }}"/>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        <x-alert type="danger" :message="$error"/>
    @endforeach
@endif

<form action="{{ route('orderform.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Имя заказчика</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Номер телефона</label>
        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email-адрес</label>
        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
    </div>
    <div class="mb-3">
        <label for="info" class="form-label">Информация</label>
        <textarea class="form-control" name="info" id="info" rows="3">{!! old('info') !!}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Отправить</button>
</form>
@endsection