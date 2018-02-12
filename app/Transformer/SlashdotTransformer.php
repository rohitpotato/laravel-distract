<?php

namespace App\Transformer;
use App\Transformer\TransformerAbstract;

class SlashdotTransformer extends TransformerAbstract
{
	public function transform($payload) 
	{
		return [

			'title' => $payload->title,
			'link' =>  $payload->permalink,
			'timestamp' => $payload->date,
			'service' => 'Slashdot',
			
		];
	}
}