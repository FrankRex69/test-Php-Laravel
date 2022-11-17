<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;



class ESClientController extends Controller
{
    // Elastichsearch-php Client
    protected $elasticsearch;    

    public function elasticsearchTest1($par1, $par2) {

        // HTTP Basic Authentication
        $hosts = ['http://elasticsearch-container:9200'];       
        $client = ClientBuilder::create()->setHosts($hosts)->build();
        
        //preparing structred data
        $params = array();    
        $params['index'] = 'universityzz';
        $params['type']  = '_doc';
        //$params['id']  = 22;
        $params['body']  = array(	
            'name' => $par1, 											
            'age' => $par2
        );    
        
        //using Index() function to inject the data
        $result = $client->index($params);							
        var_dump($result);
        
    }

    public function elasticsearchQueries() {

        // HTTP Basic Authentication
        $hosts = ['http://elasticsearch-container:9200'];       
        $client = ClientBuilder::create()->setHosts($hosts)->build();

        $params = [
            'index' => 'elettric',
            'type' => '_doc',
            'body' => [
                'query' => [
                    'match' => [
                        'City' => 'Sammamish'
                    ]
                ]
            ]
        ];        

        $result = $client->search($params);
        dump($result);

    }

}