<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*


//dynamic routing

Route::get('/course/{id}/{name}', function ($id,$name) {
   
    return 'this course is '.$name.' with an id of '.$id;
    // return view('pages/about'); //works like the above one
});

*/

Route::get('/dashboard',[DashBoardController::class ,'index'])->name('dashboard');

// Register Route

Route::get('/register',[RegisterController::class ,'index'])->name('register');
Route::post('/register',[RegisterController::class ,'store']);

// Login Route

Route::get('/login',[LoginController::class ,'index'])->name('login');
Route::post('/login',[LoginController::class ,'store']);

// Logout

Route::post('/logout',[LogoutController::class ,'store'])->name('logout');

// Home Route
Route::get('/',[PagesController::class ,'index'])->name('home');

// Posts
Route::get('/posts',[PostController::class ,'index'])->name('posts');
Route::post('/posts',[PostController::class ,'store']);
Route::delete('/posts/{post}',[PostController::class ,'destroy'])->name('posts.destroy');

// Likes
Route::post('/posts/{post}/likes',[PostLikeController::class ,'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes',[PostLikeController::class ,'destroy'])->name('posts.likes');

// User Post
Route::get('/users/{user:username}/posts',[UserPostController::class ,'index'])->name('users.posts');

//////////////////////////////////////////////////////////////////////////////////////////////////////



// Route::get('/', function (){
//     return view('welcome');
//     // return 'hello';
// });
// Route::get('/about',[PagesController::class ,'about']);
// Route::get('/services',[PagesController::class ,'services']);
// // Route::resource('posts',MyPostController::class);
// Route::get('posts/',[ArticlesController::class ,'index'])->name('posts.index');

// Route::get('posts/create',[ArticlesController::class ,'create'])->name('posts.create');
// Route::post('posts/create',[ArticlesController::class ,'store']);
// Route::get('/posts/{article}',[ArticlesController::class ,'show'])->name('posts.show');

// Route::get('/posts/{article}/edit',[ArticlesController::class ,'edit'])->name('posts.edit');
// Route::put('/posts/{article}',[ArticlesController::class ,'update'])->name('posts.update');

// Route::delete('/posts/{article}',[ArticlesController::class ,'destroy'])->name('posts.destroy');

