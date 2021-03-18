@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
           <a class="btn btn-primary" href="{{route('posts.index')}}">all posts</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">id:{{$single['id']}}</h5>

            <h5 class="card-title">title:{{$single['title']}}</h5>
            <h5 class="card-title">title:{{$single['desc']}}</h5>
        </div>
    </div>
@endsection
