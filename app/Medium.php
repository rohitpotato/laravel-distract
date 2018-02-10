<?php

namespace App;
use  ArandiLopez\Feed\Facades\Feed;

class Medium extends ServiceAbstract
{
	public function get()
	{
		$data = $this->client->request('GET', 'http://reader.one/api/news/medium?limit=20');

		return json_decode($data->getBody());

		/*$data = Feed::make('https://medium.com/feed/topic/popular');
		$feed = json_encode($data);
		return json_decode($feed);*/
	}
}