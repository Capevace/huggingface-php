<?php

namespace Mateffy\HuggingFace\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

//import requests
//
//API_URL = "https://api-inference.huggingface.co/models/distilbert/distilroberta-base"
//headers = {"Authorization": "Bearer hf_xxxxxxxxxxxxxxxxxxxxxxxx"}
//
//def query(payload):
//	response = requests.post(API_URL, headers=headers, json=payload)
//	return response.json()
//
//output = query({
//	"inputs": "The answer to the universe is <mask>.",
//})

class InferenceRequest extends Request implements HasBody
{
    use HasJsonBody;

	protected Method $method = Method::POST;

	public function __construct(protected string $model, protected array $data = [])
	{
	}

	public function resolveEndpoint(): string
    {
        return "models/{$this->model}";
    }

	protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

	protected function defaultBody(): array
    {
        return $this->data;
    }
}