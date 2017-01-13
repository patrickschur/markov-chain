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
    protected $matrix = [];

    protected $tokenizer = null;

    /**
     * MarkovChain constructor.
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
        $tmp = [];

        foreach ($input as $value)
        {
            $tmp = $this->tokenizer->tokenize($value);

            for ($i = 1, $l = count($tmp); $i < $l; $i++)
            {
                if (!isset($this->matrix[ $tmp[$i - 1] ][ $tmp[$i] ])) {
                    $this->matrix[ $tmp[$i - 1] ][ $tmp[$i] ] = 0;
                }

                $this->matrix[ $tmp[$i - 1] ][ $tmp[$i] ]++;
            }
        }

        foreach ($this->matrix as $first => $array)
        {
            $sum = array_sum($array);

            foreach ($array as $last => $count)
            {
                $count /= $sum;
                $this->matrix[$first][$last] = $count;
            }
        }
    }

    /**
     * @param string $subject
     * @return array|null
     */
    public function classify(string $subject)
    {
        if (!isset($this->matrix[$subject])) {
            return null;
        }

        $result = [];

        foreach ($this->matrix[$subject] as $word => $score)
        {
            $result[$word] = $score;
        }

        arsort($result);

        return $result;
    }
}