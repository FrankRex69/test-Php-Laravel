<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/ciao', function () {
    return ('ciao_response');
});

Route::get('/', function () {
    return view('welcome');
});

// --- query per db in mysql
Route::get('/insert', function () { 
    DB::insert('insert into table_test(field_1,field_2) values(?,?)',['asd122','fgh222']); 
});

// -- ElasticSearch
Route::get('/elastic', function () {   
    $client = Elasticsearch\ClientBuilder::create()->build();
    var_dump($client);
});