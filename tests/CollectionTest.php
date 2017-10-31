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
        foreach ($collection as $item) {
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

    public function testArrayAccess()
    {
        $collection = new Collection($this->sampleData);
        $message = "Collection can't be accessed as an array";
        $this->assertSame('string', $collection[0]);
        $this->assertSame(4,        $collection[1]);
        $this->assertSame(true,     $collection[2]);
        $this->assertSame(false,    $collection[3]);
        $this->assertSame(null,     $collection[4]);
    }
}
