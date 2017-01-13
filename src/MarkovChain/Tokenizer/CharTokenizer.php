<?php

declare(strict_types = 1);

namespace MarkovChain\Tokenizer;

/**
 * Class CharTokenizer
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package MarkovChain\Tokenizer
 */
class CharTokenizer implements TokenizerInterface
{
    public function tokenize(string $string): array
    {
        $w = (new WordTokenizer())->tokenize($string);
        $w = implode('', $w);

        return preg_split('//u', $w, -1, PREG_SPLIT_NO_EMPTY);
    }
}