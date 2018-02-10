<?php

namespace App\Transformer;
use App\Transformer\TransformerAbstract;

class MediumTransformer extends TransformerAbstract
{
	public function transform($payload) 
	{
		return [

			'title' => $payload->title,
			'link' => $payload->url,
			'read_time' => $payload->read_time,
			//'link' =>  $payload->permalink,
			//'author' => $payload->authors,
			'service' => 'Medium',
			
		];
	}
}