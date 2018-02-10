<?php

namespace App;
use  ArandiLopez\Feed\Facades\Feed;

class LifeHacker extends ServiceAbstract
{
	public function get($limit = 10)
	{
		$data = Feed::make('http://lifehacker.com/rss');
		$feed = json_encode($data);
		return json_decode($feed);
	}
}