<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;

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
//urilizzo eager loading  with()  per ovviare alla mancanza di informazioni user e category_id  > magari uso quello deldata per chiamataajax >>>QUINDI quando mi rispondi, non mi devi dare solo info inerenti al post ma anche categoria user e tag in una sola chiamata cosi le uso in lato front  (nomi metodi dei vari modelli dentro il modello come param di with )
//http://127.0.0.1:8000/api/posts?page=2
Route::get('posts', [PostController::class, 'index']);

//endpoint :  
//          http://127.0.0.1:80000/api/posts

//c'e ancheun terzo modo per farlo in laravel, piu avanzato, cerco odpo


//rotta singola
Route::get('posts/{post}', [PostController::class, 'show']);