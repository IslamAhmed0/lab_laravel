<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Models\User;
class postcontroller extends Controller
{

    public function index()
    {
        $all=Flight::paginate(3);

        return view(
            "Posts/index",[
                'posts'=>$all
            ]
        );

    }
    public function show($post)
    {
        $singlepost=Flight::find($post);
        if ($singlepost){
            return view('Posts.show',['single'=>$singlepost]);

        }else
        {
            return "not found";

        }



    }


    //create
    public function create()
    {
        $users = User::all();
        return view('Posts.create', ['users' => $users]);


    }
    //store
    public function store(StorePostRequest $request)

    {
//        Flight::create([
//            'title' => request()->title,
//            'desc' =>  request()->description,
//        ]);

      //  Flight::create();
        $flight = new Flight;

        $flight->title = $request->title;
        $flight->desc = $request->description;
        $flight->user_id=$request->user_id;
        $request->validate([
            'title'=> ['required','min:3'],
            'description'=> ['required','min:30']
        ]);

        $flight->saveOrFail();


        return redirect(route('posts.index'));
    }

    //edit
    public  function  edit($post){
        $singlepost=Flight::find($post);
        $users = User::all();
       // dd($post);
        if ($singlepost){
            return view('Posts.edit',['post'=>$singlepost,'users'=>$users]);

        }else
        {
            return "not found";

        }
    }

    //update
    public function update( Request $request, Flight $post)
    {
        $attributes = [

                'title' => $request->title,
                'desc' =>  $request->description,
            'user_id'=>$request->user_id

        ];
//        $request->validate([
//            'title'=> ['required','min:3'],
//            'description'=> ['required','min:30']
//        ],[
//            'title.required'=>'title is required',
//             'description.required'=>'description is required'
//
//            ]
//        );

        $post->update($attributes);
        return redirect()->route('posts.show', ['post' => $request->post]);
    }

    //destory

    public function destroy($post)
    {
       //dd($post);
        $singlepost=Flight::find($post);
        $singlepost->delete();
        return redirect()->route('posts.index');
    }


}
