<?php

namespace App\Transformer;
use App\Transformer\TransformerAbstract;

class LifeHackerTransformer extends TransformerAbstract
{
	public function transform($payload) 
	{
		return [

			'title' => $payload->title,
			'link' =>  $payload->permalink,
			'created_at' => $payload->date,
			'service' => 'LifeHacker',
			
		];
	}
}