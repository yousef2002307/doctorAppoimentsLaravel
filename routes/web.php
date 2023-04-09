<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Viewscon;
use Illuminate\Support\Facades\DB;
use App\Models\Scedule;
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
Route::get('/', [Viewscon::class,'home'])->name("homepage");
Route::get('/doctors', [Viewscon::class,'doctors'])->name("doctors");
Route::post('/requestapp', [Viewscon::class,'requestapp'])->name("requestapp");

Route::any('/specialities/{id}', [Viewscon::class,'spec']);
Route::any("/ajax1",[Viewscon::class,'ajaxdoctors']);
Route::get('/samy', function () {
    $val = Scedule::find(3);
    echo $val->time_from;
    
});
Route::get('/about', function () {
   
   
    return view("about");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
