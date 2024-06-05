<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return response()->json([
            'success' => true,
            'sarah' => 'test',
            'results' => Post::with(['category','user','tags'])->orderByDesc('id')->paginate(), //->get()
        ]);
    }

    public function show($id){
        $post = Post::with(['category','user','tags'])->where('id', $id) ->first();
        if($post){
            return response()->json([
                'success' => true,
                'results' => $post
            ]);
    
        } else {
            return response()->json([
                'success' => false,
                'results' => "404 not found"
            ]);
    
        }
    }
}
