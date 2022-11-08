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

// --- query per db in mysql
Route::get('/insert', function () { 
    DB::insert('insert into table_test(field_1,field_2) values(?,?)',['asd122','fgh222']); 
});

//-- ElasticSearch
// Route::prefix('elasticsearch')->group(function (){
//     Route::get('test', ['uses'=> ESClientController::class, 'elasticsearchTest']);
// });

Route::get('test', [ESClientController::class, 'elasticsearchTest']);

Route::get('/enter/{age}/{name}',function($age,$name){

    // HTTP Basic Authentication
    $hosts = ['http://elasticsearch-container:9200'];
    $client = ClientBuilder::create()->setHosts($hosts)->build();
    
    //preparing structred data
    $params = array();    
    $params['index'] = 'university66';
    $params['type']  = '_doc';
    $params['body']  = array(	
        'name' => $name, 											
        'age' => $age
    );    
    
    //using Index() function to inject the data
    $result = $client->index($params);							
    var_dump($result);
});

Route::get('user/{id}', 'UserController@showProfile');
Route::get('user/{id}',[UserController::class, 'showProfile']);

Route::get('/inserimento/{age}/{name}',[ESClientController::class, 'elasticsearchTest1']);