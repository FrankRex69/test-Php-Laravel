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

Route::get('/miao22', function () {
    return ('miao');
});

Route::get('/ciao1', function () {
    return ('ciao222');
});

Route::get('/', function () {
    return view('welcome');
});

// --- query per db in mysql
Route::get('/insert', function () { 
    DB::insert('insert into table_test(field_1,field_2) values(?,?)',['valore1','valore2']); 
});

// -- ElasticSearch
Route::get('/elastic', function () {   
    $client = Elasticsearch\ClientBuilder::create()->build();
    var_dump($client);
});