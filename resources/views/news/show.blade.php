@extends('layouts.main')
@section('content')
<h1>{{$newsItem['title']}}</h1>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <div class="col-4">
        <img class="bd-placeholder-img card-img-top" src="{{$newsItem['image']}}" alt="{{$newsItem['title']}}">
    </div>
    <div class="col-8">
        <div class="card-body">
            <p class="card-text">{!! $newsItem['description'] !!}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
                <small class="text-muted">{{$newsItem['status']}}: {{$newsItem['author']}}</small>
            </div>
        </div>
    </div>
</div>
@endsection
