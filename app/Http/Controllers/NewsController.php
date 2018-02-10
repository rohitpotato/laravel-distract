<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\ServiceContainer;

class NewsController extends Controller
{
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

    public function show($service)
    {	
    	$services = new ServiceContainer($this->client);
    	$response = $services->get($service);

    	return response()->json($response, 200);
    }
}
