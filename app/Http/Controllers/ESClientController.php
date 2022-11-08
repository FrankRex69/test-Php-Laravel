<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;



class ESClientController extends Controller
{
    // Elastichsearch-php Client
    protected $elasticsearch;

    // Elastica Client
    protected $elastica;

    public function elasticsearchTest1() {

        // HTTP Basic Authentication
        $hosts = ['http://elasticsearch-container:9200'];       
        $client = ClientBuilder::create()->setHosts($hosts)->build();
        
        //preparing structred data
        $params = array();    
        $params['index'] = 'universityzz';
        $params['type']  = '_doc';
        $params['id']  = 21;
        $params['body']  = array(	
            'name' => 'qsqqwrwrzz', 											
            'age' => 'trttyjjytjyzz'
        );    
        
        //using Index() function to inject the data
        $result = $client->index($params);							
        var_dump($result);
        
    }

    //Elastichsearch-php Client
    public function elasticsearchTest2() {
        //view our Elastichsearch-php client object
        dump($this->elasticsearch);

        echo "\n\nRetrieve a document:\n";
        $params = [
            'index' => 'pets',
            'type' => 'dog',
            'id' => '1'
        ];
        $response = $this->elasticsearch->get($params);
        dump($response);
    }

    public function elasticsearchTest() {
        echo "asdfghjkl";
    }

}