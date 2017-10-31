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
            'Number of items looped through does not match size of sample data'
        );
    }
}
