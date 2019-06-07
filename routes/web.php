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

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes(['register' => false]);
Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('articles', 'ArticleController', [
        'only' => ['index', 'show', 'create', 'store', 'update', 'delete']
    ]);
    

    Route::get('/home', 'HomeController@index')->name('home');
});

/*
Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    // list all lfm routes here...
});

$middleware = array_merge(\Config::get('lfm.middlewares'), [
    '\Unisharp\Laravelfilemanager\middlewares\MultiUser',
    '\Unisharp\Laravelfilemanager\middlewares\CreateDefaultFolder'
]);
$prefix = \Config::get('lfm.prefix', 'laravel-filemanager');
$as = 'unisharp.lfm.';
$namespace = '\Unisharp\Laravelfilemanager\controllers';

*/
