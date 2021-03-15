@extends('layouts.app')
@section('mycontent')

    <a href='{{route('posts.create')}}' class="btn btn-primary">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">posted by</th>
            <th scope="col">create at</th>
            <th scope="col">desc</th>

            <th scope="col">action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post['title']}}</td>
            <td>{{$post->user?$post->user->name :"user not found"}}</td>
            <td>{{$post['created_at']->format('y-m-d')}}</td>
            <td>{{$post['desc']}}</td>

            <td>
{{--                /posts/{{$a['id']}}--}}
                <a href="{{route('posts.show',['post'=>$post['id']])}}" class="btn btn-info">view</a>
                <a href="{{route('posts.edit',['post'=>$post['id']])}}" class="btn btn-primary">edit</a>
                <form style="display: inline-block" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                    @method('DELETE') @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center pt-4">

            <div class="text-center">
                {{$posts->links()}}
            </div>
        </div>
    </div>

    <style>

        .w-5{
            display: none;
        }

    </style>

@endsection
