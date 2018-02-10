<?php

namespace App\Transformer;

use Carbon\Carbon;

class ProductHuntTransformer extends TransformerAbstract
{
	public function transform($payload)
	{
		return [

			'title' => $payload->name,
			'link' => $payload->discussion_url,
			'timestamp' => Carbon::parse($payload->created_at)->getTimeStamp(),
			'service' => 'ProductHunt',
			'score' => isset($payload->score) ? $payload->data->score : null
		];
	}
}