<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
* Snippet for a quick route reference
*/
Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()["GET"])->map(function($value, $key) {
        if (substr($key, 0, 3) == 'api') {
            return url($key);
        }
    })->filter()->values();   
});

Route::resource('categories', 'CategoryAPIController', [
    'only' => ['index', 'show']
]);

Route::resource('tags', 'TagAPIController', [
    'only' => ['index', 'show']
]);

Route::resource('articles', 'ArticleAPIController', [
    'only' => ['index', 'show']
]);

Route::get('/search', 'ArticleAPIController@search');
/*
Route::resource('users', 'UserAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'delete']
]);
*/