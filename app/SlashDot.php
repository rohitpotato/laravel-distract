<?php

namespace App;
use  ArandiLopez\Feed\Facades\Feed;

class Slashdot extends ServiceAbstract
{
	public function get($limit = 10)
	{
		$data = Feed::make('http://rss.slashdot.org/Slashdot/slashdotMain');
		$feed = json_encode($data);
		return json_decode($feed);
	}
}