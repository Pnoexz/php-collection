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
    public function testInstance()
    {
        $collection = new Collection([]);
        $this->assertInstanceOf('Pnoexz\Collection', $collection);
    }
}
