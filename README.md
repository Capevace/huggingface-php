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

$result = HuggingFace::run(
    token: $token,
    model: 'j-hartmann/emotion-english-distilroberta-base',
    data: [
        'inputs' => 'I am happy',
    ]
);
```