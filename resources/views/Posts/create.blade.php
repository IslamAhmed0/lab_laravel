@extends('layouts.app')
@section('mycontent')
    <div class="container">
        <form  method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label >Title</label>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" aria-describedby="emailHelp">
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Post create</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
