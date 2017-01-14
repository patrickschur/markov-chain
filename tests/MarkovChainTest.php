<?php

declare(strict_types = 1);

namespace MarkovChain\Tests;

use MarkovChain\MarkovChain;
use MarkovChain\Tokenizer\CharTokenizer;
use MarkovChain\Tokenizer\WordTokenizer;

/**
 * Class MarkovChainTest
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package MarkovChain\Tests
 */
class MarkovChainTest extends \PHPUnit_Framework_TestCase
{
    public function testWordTokenizer()
    {
        $c = new MarkovChain(new WordTokenizer());

        $c->learn([
            'a b c d e f g',
            'g e c f a b d',
            'g f e b g a d',
        ]);

        $this->assertEquals(['b' => 0.6666666666666667, 'd' => 0.3333333333333333], $c->classify('a'));
    }

    public function testCharTokenizer()
    {
        $c = new MarkovChain(new CharTokenizer());

        $c->learn([
            'abaabbaaabbb',
            'babbaabbbaaa',
            'cdccddcccddd',
            'dcddccdddccc',
        ]);

        $this->assertEquals($c->classify('a')['a'], $c->classify('b')['b']);
    }

    public function testIsNull()
    {
        $c = new MarkovChain(new WordTokenizer());

        $c->learn(['']);

        $this->assertNull($c->classify('a'));
    }
}