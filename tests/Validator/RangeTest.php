<?php

/**
 * Utopia PHP Framework
 *
 * @package Framework
 * @subpackage Tests
 *
 * @link https://github.com/utopia-php/framework
 * @author Appwrite Team <team@appwrite.io>
 * @version 1.0 RC4
 * @license The MIT License (MIT) <http://www.opensource.org/licenses/mit-license.php>
 */

namespace Utopia\Validator;

use PHPUnit\Framework\TestCase;

class RangeTest extends TestCase
{
    public function testCanValidateIntegerRange()
    {
        $range = new Range(0, 5, \Utopia\Validator::TYPE_INTEGER);

        // Assertions for integer
        $this->assertTrue($range->isValid(0));
        $this->assertTrue($range->isValid(1));
        $this->assertTrue($range->isValid(4));
        $this->assertTrue($range->isValid(5));
        $this->assertTrue($range->isValid('5'));
        $this->assertFalse($range->isValid('1.5'));
        $this->assertFalse($range->isValid(6));
        $this->assertFalse($range->isValid(-1));
        $this->assertEquals(0, $range->getMin());
        $this->assertEquals(5, $range->getMax());
        $this->assertFalse($range->isArray());
        $this->assertEquals(\Utopia\Validator::TYPE_INTEGER, $range->getFormat());
        $this->assertEquals(\Utopia\Validator::TYPE_INTEGER, $range->getType());
    }

    public function testCanValidateFloatRange()
    {
        $range = new Range(0, 1, \Utopia\Validator::TYPE_FLOAT);

        $this->assertTrue($range->isValid(0.0));
        $this->assertTrue($range->isValid(1.0));
        $this->assertTrue($range->isValid(0.5));
        $this->assertTrue($range->isValid('0.5'));
        $this->assertTrue($range->isValid('0.6'));
        $this->assertFalse($range->isValid(4));
        $this->assertFalse($range->isValid(1.5));
        $this->assertFalse($range->isValid(-1));
        $this->assertEquals(0, $range->getMin());
        $this->assertEquals(1, $range->getMax());
        $this->assertFalse($range->isArray());
        $this->assertEquals(\Utopia\Validator::TYPE_FLOAT, $range->getFormat());
        $this->assertEquals(\Utopia\Validator::TYPE_FLOAT, $range->getType(), \Utopia\Validator::TYPE_FLOAT);
    }

    public function canValidateInfinityRange()
    {
        $integer = new Range(5, INF, \Utopia\Validator::TYPE_INTEGER);
        $float = new Range(-INF, 45.6, \Utopia\Validator::TYPE_FLOAT);

        $this->assertTrue($integer->isValid(25));
        $this->assertFalse($integer->isValid(3));
        $this->assertTrue($integer->isValid(INF));
        $this->assertTrue($float->isValid(32.1));
        $this->assertFalse($float->isValid(97.6));
        $this->assertTrue($float->isValid(-INF));
    }
}
