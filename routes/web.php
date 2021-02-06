<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
	
    return view('home');
    
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');*/
Route::middleware(['auth:sanctum', 'verified'])->get('/job', function () {
    $jobs = App\Models\Job::get();
    return view('job.index',compact('jobs'));
})->name('job');


Route::get('job','JobController@index');
Route::get('job/create','JobController@create')->name('job.create');
Route::post('job/store','JobController@store')->name('job.store');
Route::get('job/edit/{id}','JobController@edit')->name('job.edit');
Route::put('job/update/{id}','JobController@update')->name('job.update');
Route::get('job/{id}','JobController@show')->name('job.show');
Route::delete('job/{id}/delete','JobController@delete')->name('job.delete');