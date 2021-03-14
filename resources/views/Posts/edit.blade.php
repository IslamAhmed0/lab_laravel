@extends('layouts.app')
@section('mycontent')
    <div class="container">
        <form  method="post" action="{{route('posts.update',$post->id)}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label >Title</label>
                <input name="title" type="text" value="{{$post->title}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="form-control">{{$post->desc}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Post create</label>
                <select name="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}" @if($user->id==$post->user_id) selected @endif>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>




            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>
@endsection
