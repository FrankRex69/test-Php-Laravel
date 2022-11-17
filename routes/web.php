<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ESClientController;
use Elasticsearch\ClientBuilder;


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

Route::get('/ciao15', function () {
    return ('ciao_response15');
});

Route::get('/', function () {
    return view('welcome');
});

// Insert data into ElastichSearch
Route::get('/inserimento/{age}/{name}',[ESClientController::class, 'elasticsearchTest1']);

// simple queries data into ElastichSearch
Route::get('/simplequery',[ESClientController::class, 'elasticsearchQueries']);