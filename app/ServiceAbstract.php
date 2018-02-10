<?php

namespace App;
use GuzzleHttp\Client;

abstract class ServiceAbstract
{
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}
}