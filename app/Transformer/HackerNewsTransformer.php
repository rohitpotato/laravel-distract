<?php

namespace App\Transformer;
use App\Transformer\TransformerAbstract;

class HackerNewsTransformer extends TransformerAbstract
{
	public function transform($payload)
	{
		return [

			'title' => $payload->title,
			'link' => isset($payload->url) ? $payload->url : 'https://news.ycombinator.com/item?id=' . $payload->id,
			'timestamp' => $payload->time,
			'service' => 'Hacker News',
			'score' => $payload->score,
		];
	}
}