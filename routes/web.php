<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectController; //import 
use App\Models\Project;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});  //http://localhost:8000/

Route::get('projects', function () {
    return view('guests.projects.index', ['projects'=>Project::orderByDesc('id')->paginate(8)]);
})->name('guests.projects.index'); 

Route::get('projects/{project}', function (Project $project) {
    return view('guests.projects.show', compact('project'));
})->name('guests.projects.show');



Route::middleware(['auth','verified'])
->prefix('admin')  //  /admin
->name('admin.')//nome delle rotte es. admin.dashboard
->group(function(){
    //http://localhost:8000/admin
    Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard'); 
    
    //route dei posts 
    Route::resource('posts', PostController::class);

    //route dei projects
    Route::resource('projects', ProjectController::class);
        
}); 



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
