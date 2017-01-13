<?php

declare(strict_types = 1);

namespace MarkovChain\Tokenizer;

/**
 * Class WordTokenizer
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package MarkovChain\Tokenizer
 */
class WordTokenizer implements TokenizerInterface
{
    public function tokenize(string $string): array
    {
        return preg_split('/[^\pL]+/u', $string, -1, PREG_SPLIT_NO_EMPTY);
    }
}