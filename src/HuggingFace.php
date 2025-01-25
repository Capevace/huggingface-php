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
	public function run(string $model, array $data = [])
	{
		return $this->connector()
			->send(new InferenceRequest($model, $data))
			->dtoOrFail();
	}

	/**
	 * @throws FatalRequestException
	 * @throws RequestException
	 */
	public static function inference(string $token, string $model, array $data = [], ?array $inputs = null, ?string $input = null): array
	{
		$client = new self($token);

		// If we passed a single input, we modify the return value to be the first element of the result
		if ($input !== null) {
			$result = $client->run($model, ['inputs' => [$input]]);

			return $result[0];
		}

		// If we passed multiple inputs, we modify the return value to be the result
		if ($inputs !== null) {
			$data = ['inputs' => $inputs];
		}

		return $client->run($model, $data);
	}
}