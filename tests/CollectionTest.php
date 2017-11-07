<?php
/**
 * @author Matias Pino <pnoexz@gmail.com>
 * @license GPL v3.0
 */

namespace Pnoexz\Tests;

use Pnoexz\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /** @var array */
    protected $sampleData = [
        'string',
        4,
        true,
        false,
        null,
    ];

    public function testInstance()
    {
        $collection = new Collection($this->sampleData);
        $this->assertInstanceOf('Pnoexz\Collection', $collection);
    }

    public function testIterator()
    {
        $collection = new Collection($this->sampleData);
        $i = 1;
        /** @noinspection PhpUnusedLocalVariableInspection */
        foreach ($collection as $key => $item) {
            $i++;
        }
        $this->assertSame(
            count($this->sampleData),
            $i,
            'Number of items looped through does not match size of sample data.'
        );
    }

    public function testCountable()
    {
        $collection = new Collection($this->sampleData);
        $this->assertSame(
            count($this->sampleData),
            count($collection),
            'Value returned by count() does not match size of sample data.'
        );
    }

    public function testArrayAccessGet()
    {
        $collection = new Collection($this->sampleData);
        $message = "Collection can't be accessed as an array or got " .
            "different data from sample data";
        $this->assertSame('string', $collection[0], $message);
        $this->assertSame(4, $collection[1], $message);
        $this->assertSame(true, $collection[2], $message);
        $this->assertSame(false, $collection[3], $message);
        $this->assertSame(null, $collection[4], $message);
    }

    public function testArrayAccessUnset()
    {
        $collection = new Collection($this->sampleData);
        unset($collection[4]);
        $expectedSize = count($this->sampleData) - 1;
        $this->assertSame($expectedSize, count($collection));
    }

    public function testArrayAccessAddNew()
    {
        $collection = new Collection($this->sampleData);
        $collection[] = 'new item';
        $newKey = count($this->sampleData); // +1 for new key, -1 because 0-indexed
        $this->assertSame('new item', $collection[$newKey]);
    }

    public function testArrayAccessReplace()
    {
        $collection = new Collection($this->sampleData);
        $collection[0] = 'replaced item';
        $this->assertSame('replaced item', $collection[0]);
    }

    public function testArrayAccessOffsetExists()
    {
        $collection = new Collection([1]);
        $this->assertTrue(isset($collection[0]));
        $this->assertFalse(isset($collection[2]));
    }
}
