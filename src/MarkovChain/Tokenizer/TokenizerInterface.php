<?php

declare(strict_types = 1);

namespace MarkovChain\Tokenizer;

/**
 * Interface TokenizerInterface
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package MarkovChain\Tokenizer
 */
interface TokenizerInterface
{
    public function tokenize(string $string): array;
}