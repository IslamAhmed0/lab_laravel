<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Flight;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $post=Flight::all();
        return PostResource::collection($post);
    }
    function show($post){
        $post=Flight::find($post);
        return new PostResource($post);
    }
}
