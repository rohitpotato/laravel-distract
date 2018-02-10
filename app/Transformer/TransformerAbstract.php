<?php

namespace App\Transformer;

abstract class TransformerAbstract
{
	protected $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function create()
	{
		return array_map(function ($item) {

			return $this->transform($item);

		}, $this->data);
	}
}