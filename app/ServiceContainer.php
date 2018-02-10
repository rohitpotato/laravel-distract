<?php

namespace App;
use GuzzleHttp\Client;
use App\Hackernews;
use App\Transformer\HackerNewsTransformer;
use App\Transformer\RedditTransformer;
use App\Transformer\ProductHuntTransformer;
use Cache;
use App\Slashdot;
use App\Transformer\LifeHackerTransformer;
use App\Medium;
use App\Transformer\MediumTransformer;
use App\Transformer\SlashdotTransformer;

class ServiceContainer
{
	protected $client;

	protected $enabledServices = [

			'producthunt',
			'reddit',
			'hackernews',
			'lifehacker',
			'medium',
			'slashdot',
			'all'
	];

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function get($service, $limit = 10)
	{
		if(method_exists($this, $service) && $this->serviceIsEnabled($service)) {

			return $this->{$service}($limit);
		}

		return [];
	}

	public function all()
	{
		$data = Cache::remember('all', 10, function () {

			return json_encode(array_merge($this->reddit(), $this->lifehacker(), $this->producthunt(), $this->medium(), $this->slashdot(), $this->hackernews()));
		});

		return json_decode($data);

	}

	public function hackernews($limit = 10)
	{
		$data = Cache::remember('hackernews', 10, function () use ($limit) {

			return json_encode((new Hackernews($this->client))->get($limit));
		});

		return (new HackerNewsTransformer(json_decode($data)))->create();
	}

	public function reddit($limit = 10)
	{
		$data = Cache::remember('reddit', 10, function () use ($limit) {

			return json_encode((new Reddit($this->client))->get($limit));
		});

		return (new RedditTransformer(json_decode($data)))->create();
	} 

	protected function sortResponseByTimestamp(array $data)
	{
		usort($data, function ($a, $b) {

			return $a['timestamp'] - $b['timestamp'];

		});	

		return $data;
	}

	public function producthunt($limit = 10)
	{
		$data = Cache::remember('producthunt', 10, function () use ($limit) {

			return json_encode((new ProductHunt($this->client))->get($limit));
		});

		return (new ProductHuntTransformer(json_decode($data)))->create();
	}

	public function lifehacker($limit = 10)
	{	

		$data = Cache::remember('lifehacker', 10, function () use ($limit) {

				return json_encode((new LifeHacker($this->client))->get($limit));
		});

		return (new LifeHackerTransformer(json_decode($data)))->create();
	}

	public function medium($limit = 10)
	{
		//return (new Medium($this->client))->get($limit);

		$data = Cache::remember('medium', 10, function () use ($limit) {

			return json_encode((new Medium($this->client))->get($limit));
		});

		return (new MediumTransformer(json_decode($data)))->create();
	}	

	public function slashdot($limit = 10)
	{
		$data = Cache::remember('slashdot', 10, function () use ($limit) {

			return json_encode((new Slashdot($this->client))->get($limit));
		});

		return (new SlashdotTransformer(json_decode($data)))->create();
	}

	protected function serviceIsEnabled($service)
	{
		return in_array($service, $this->enabledServices);
	}
}