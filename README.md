# markov-chain
[![Build Status](https://travis-ci.org/patrickschur/markov-chain.svg?branch=master)](https://travis-ci.org/patrickschur/markov-chain)
[![codecov](https://codecov.io/gh/patrickschur/markov-chain/branch/master/graph/badge.svg)](https://codecov.io/gh/patrickschur/markov-chain)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.0-5ba6cc.svg?style=flat-square)](http://php.net/)
[![License](https://img.shields.io/packagist/l/patrickschur/language-detection.svg?style=flat-square)](https://opensource.org/licenses/MIT)

An implementation of the Markov chain algorithm in PHP.

Installation with Composer
-
```bash
$ composer require patrickschur/markov-chain
```

How to use
-
WordTokenizer
-
```php
use MarkovChain\MarkovChain;
use MarkovChain\Tokenizer\WordTokenizer;
 
$c = new MarkovChain(new WordTokenizer());
 
$c->learn([
    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
    'At vero eos et accusam et justo duo dolores et ea rebum.',
]);
 
print_r($c->classify('et'));
/*
    [
        'accusam' => 0.33333333333333,
        'justo' => 0.33333333333333,
        'ea' => 0.33333333333333
    ]
*/
```

CharTokenizer
-
```php
use MarkovChain\MarkovChain;
use MarkovChain\Tokenizer\CharTokenizer;
 
$c = new MarkovChain(new CharTokenizer());
 
$c->learn([
    'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
    'At vero eos et accusam et justo duo dolores et ea rebum.',
]);
 
print_r($c->classify('a'));
/*
    [
        'm' => 0.4,
        'd' => 0.2,
        'c' => 0.2,
        'r' => 0.2
    ]
*/
```
