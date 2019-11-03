<?php

abstract class AbstractData {

	protected $data = [];

	protected $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];


	public function setData($data)
	{	
		$this->data = $data;
	}

	public function getData()
	{
		return $this->data;
	}

	public function getAlphabet()
	{
		return $this->alphabet;
	}
}