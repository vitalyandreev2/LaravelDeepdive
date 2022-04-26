@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
            @if(Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">В админку</a>
            @endif
        </div>
    </div>
</div>
@endsection