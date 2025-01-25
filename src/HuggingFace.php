<?php

namespace Mateffy;

use Mateffy\HuggingFace\HuggingFaceConnector;
use Mateffy\HuggingFace\Requests\InferenceRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class HuggingFace
{
	public function __construct(protected string $token)
	{
	}

	public function connector(): HuggingFaceConnector
	{
		return new HuggingFaceConnector($this->token);
	}

	/**
	 * @throws FatalRequestException
	 * @throws RequestException
	 */
	public function infer(string $model, array $data = [])
	{
		return $this->connector()
			->send(new InferenceRequest($model, $data))
			->dtoOrFail();
	}

	/**
	 * @throws FatalRequestException
	 * @throws RequestException
	 */
	public static function run(string $token, string $model, array $data = [])
	{
		return (new static($token))->infer($model, $data);
	}
}