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

class BooleanTest extends TestCase
{
    public function testCanValidateStrictly()
    {
        $boolean = new Boolean();

        $this->assertTrue($boolean->isValid(true));
        $this->assertTrue($boolean->isValid(false));
        $this->assertFalse($boolean->isValid('false'));
        $this->assertFalse($boolean->isValid('true'));
        $this->assertFalse($boolean->isValid('0'));
        $this->assertFalse($boolean->isValid('1'));
        $this->assertFalse($boolean->isValid(0));
        $this->assertFalse($boolean->isValid(1));
        $this->assertFalse($boolean->isValid(['string', 'string']));
        $this->assertFalse($boolean->isValid('string'));
        $this->assertFalse($boolean->isValid(1.2));
        $this->assertFalse($boolean->isArray());
        $this->assertEquals($boolean->getType(), \Utopia\Validator::TYPE_BOOLEAN);
    }
    public function testCanValidateLoosely()
    {
        $boolean = new Boolean(true);

        $this->assertTrue($boolean->isValid(true));
        $this->assertTrue($boolean->isValid(false));
        $this->assertTrue($boolean->isValid('false'));
        $this->assertTrue($boolean->isValid('true'));
        $this->assertTrue($boolean->isValid('0'));
        $this->assertTrue($boolean->isValid('1'));
        $this->assertTrue($boolean->isValid(0));
        $this->assertTrue($boolean->isValid(1));
        $this->assertFalse($boolean->isValid(['string', 'string']));
        $this->assertFalse($boolean->isValid('string'));
        $this->assertFalse($boolean->isValid(1.2));
        $this->assertFalse($boolean->isArray());
        $this->assertEquals(\Utopia\Validator::TYPE_BOOLEAN, $boolean->getType());
    }
}
