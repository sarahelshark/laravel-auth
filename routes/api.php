<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Option 1 - Basic json response format , returns an array of object
/*Route::get('posts',function(){
    return Post::all();
}); */

//Oprion 2 - utilizzando response posso personalizzare la mia risposta json 
Route::get('posts',function(){
    return response()->json([
        'success' => true,
        'sarah' => 'test',
        'results' => Post::orderByDesc('id')->paginate(), //->get()
    ]);
});

//endpoint :  
//          http://127.0.0.1:80000/api/posts

//c'e ancheun terzo modo per farlo in laravel, piu avanzato, cerco odpo
