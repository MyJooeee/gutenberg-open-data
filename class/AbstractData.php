<?php

abstract class AbstractData {

	/**
	 * @var array
	 */
	protected $data = [];

	/**
	 * @var array
	 */
	protected $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

	/**
	 * @var array
	 */
	protected $dictionary = [];

	/**
	 * Set data for all services
	 * @param array $data
	 */
	public function setData($data)
	{
		$this->data = $data;
	}

	/**
	 * Get data for all services
	 * @return array
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * Set words dictionary for all services
	 * @param array $data
	 */
	public function setDictionary($data)
	{
		$this->dictionary = $data;
	}

	/**
	 * Get words dictionary for all services
	 * @return array
	 */
	public function getDictionary()
	{
		return $this->dictionary;
	}

	/**
	 * Array alphabet used to normaliza data
	 * @return array
	 */
	public function getAlphabet()
	{
		return $this->alphabet;
	}
}
