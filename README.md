# HuggingFace API client for PHP

A PHP SDK to interact with the HuggingFace API using just a few lines of code.

## 🧑‍💻 Step 1: Installation

```bash
composer require mateffy/huggingface
```

## 🚀 Step 2: Usage

```php
use Mateffy\HuggingFace;

$token = 'API_TOKEN';

$client = new HuggingFace($token);

$result = $client->run(
    model: 'j-hartmann/emotion-english-distilroberta-base',
    data: [
        'inputs' => 'I am happy',
    ]
);

// or shorthand:

$result = HuggingFace::inference(
    token: $token,
    model: 'j-hartmann/emotion-english-distilroberta-base',
    data: [
        'inputs' => 'I am happy',
    ]
);


```

## Changelog

### 1.0.3

- fix: added response data as return value

### 1.0.2

- fix: added autoload to composer.json 