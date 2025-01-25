<?php

namespace Mateffy\HuggingFace;

use Saloon\Http\Auth\TokenAuthenticator;

class HuggingFaceConnector extends \Saloon\Http\Connector
{
	public function __construct(protected readonly string $token)
	{
	}

	public function resolveBaseUrl(): string
    {
        return 'https://api-inference.huggingface.co';
    }

	protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }
}