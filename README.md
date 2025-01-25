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

$emotions = $client->run(
    model: 'j-hartmann/emotion-english-distilroberta-base',
    input: 'I am happy',
);
/* -> [['label' => 'happy', 'score' => 0.9999], ...] */



/*
 * Shorthand version:
 */

$emotions = HuggingFace::inference(
    token: $token,
    model: 'j-hartmann/emotion-english-distilroberta-base',
    /* Passing a single input will make the response also be a single value */
    input: 'I am happy',
);
/* -> [['label' => 'happy', 'score' => 0.9999], ...] */


/* 
 * or with multiple inputs
 */

$result = $client->run(
    model: 'j-hartmann/emotion-english-distilroberta-base',
    /* Multiple inputs will return an array of results */
    inputs: [
        'I am happy',
        'I am sad',
    ]
);
/*
 * -> [
 *      [['label' => 'happy', 'score' => 0.9999], ...]],
 *      [['label' => 'sad', 'score' => 0.9999], ...]],
 * ]
 */
```

## Changelog

### 1.0.4
- feat: better API for single/multiple inputs

### 1.0.3

- fix: added response data as return value

### 1.0.2

- fix: added autoload to composer.json 