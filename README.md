# markov-chain

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
