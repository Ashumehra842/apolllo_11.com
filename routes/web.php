<?php

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




// dd(app()->make('myfun'));
// dd(app()->make('secondfun'));
Route::get('/myfun', 'HomeController@myfun');
Route::get('/testvar', 'HomeController@test12')->name('ashumehra');
Route::get('/test', 'HomeController@test')->name('test');
Route::post('save-test', 'HomeController@savetest')->name('save-test');
Route::post('new-image', 'HomeController@store')->name('new-image');



Auth::routes();


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>['web','auth']],function(){
	
Route::get('/home',function(){
	
		if(Auth::user()->is_admin==0){
                    return view("/home");
		}else{
			// dd('ss');
			$users['users'] = \App\User::all();
			return view('/guest',$users);
		}
	});



});
// Route::resource('ashu','AshuController');
// Route::resource('person','PersonController');