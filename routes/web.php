<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

/* Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();


Route::middleware('auth')
->prefix('admin')
->namespace('Admin')
->name('admin.')
->group(function ()
{
    //Admin Dashbors
    Route::get('/', 'HomeController@index')->name('dashboard'); //admin.dashboard
    //Admin Posts
    route::resource('posts','PostController')->parameters([
        'posts' => 'post:slug'
    ]);

});









/* DEVE ESSERE SEMPRE L'ULTIMA */
Route::get("{any?}", function ()
{
    return view('guest.home');
})->where('any','.*');


/*
- close registration
- model:
Category-> TablesCategories-> Admin/CategoryController + One to Many
Tag-> TablesTags-> Admin/TagController + Many to Many


*/
