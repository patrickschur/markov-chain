<?php

declare(strict_types = 1);

namespace MarkovChain;

use MarkovChain\Tokenizer\TokenizerInterface;

/**
 * Class MarkovChain
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package MarkovChain
 */
class MarkovChain
{
    /**
     * @var array
     */
    protected $result = [];

    /**
     * @var TokenizerInterface|null
     */
    protected $tokenizer = null;

    /**
     * MarkovChain constructor.
     *
     * @param TokenizerInterface $tokenizer
     */
    public function __construct(TokenizerInterface $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    /**
     * @param array $input
     */
    public function learn(array $input)
    {
        $matrix = [];

        foreach ($input as $value)
        {
            $array = $this->tokenizer->tokenize($value);

            for ($pos = 1, $length = count($array); $pos < $length; $pos++, $count++)
            {
                $count = &$matrix[ $array[$pos - 1] ][ $array[$pos] ];
            }
        }

        foreach ($matrix as $prev => $array)
        {
            $total = array_sum($array);

            foreach ($array as $next => $count)
            {
                $this->result[$prev][$next] = ($count / $total);
            }
        }

    }

    /**
     * @param string $subject
     * @return array|null
     */
    public function classify(string $subject)
    {
        if (!isset($this->result[$subject])) {
            return null;
        }

        arsort($this->result[$subject]);

        return $this->result[$subject];
    }
}