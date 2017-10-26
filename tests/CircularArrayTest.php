<?php

/*
 * This file is part of the Packagist Mirror.
 *
 * For the full license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace PHPSnippets\DataStructures\Tests;

use PHPUnit\Framework\TestCase;
use PHPSnippets\DataStructures\CircularArray as Circular;

/**
 * Circular Array tests.
 *
 * @author Webysther Nunes <webysther@gmail.com>
 */
class CircularArrayTest extends TestCase
{
    public function testFromArray()
    {
        $sample = array(1, 2, 3, 4);
        $circular = Circular::fromArray($sample);
        $this->assertSame($sample, $circular->toArray());
    }

    public function testLooping()
    {
        $sample = array(1, 2, 3, 4);
        $circular = Circular::fromArray($sample);
        $counter = 0;

        foreach ($circular as $value) {
            $counter++;

            if($counter == 50){
                break;
            }
        }

        $this->assertSame(50, $counter);
    }
}
