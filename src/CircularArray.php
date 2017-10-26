<?php

/*
 * This file is part of the PHP Snippets - Circular Array.
 *
 * For the full license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace PHPSnippets\DataStructures;

use SplFixedArray;

/**
 * Circular Array (implies to be fixed).
 *
 * @author Webysther Nunes <webysther@gmail.com>
 */
class CircularArray extends SplFixedArray
{
    /**
     * Rewind if goes to last items
     */
    public function next()
    {
        if ($this->key() + 1 == $this->count()) {
            $this->rewind();

            return;
        }

        parent::next();
    }

    /**
     * Convert a simple array to fixed circular array
     *
     * @param  array   $array
     * @param  boolean $save_indexes
     * @return FixedCircularArray
     */
    public static function fromArray($array, $save_indexes = true)
    {
        $circular = new self(count($array));

        foreach ($array as $key => $value) {
            $circular[$key] = $value;
        }

        return $circular;
    }

    /**
     * Convert to simple array
     *
     * @return array
     */
    public function toArray()
    {
        return parent::toArray();
    }
}
