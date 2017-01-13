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
        return preg_split('//u', preg_replace('/[^\pL]+/u', '', $string), -1, PREG_SPLIT_NO_EMPTY);
    }
}