<?php

namespace RoundPartner\Unit;

use \RoundPartner\VerifyHash\VerifyHash;

class VerifyHashTest extends \PHPUnit_Framework_TestCase
{
    const SECRET_STRING = 'this is my secret';

    /**
     * @dataProvider \RoundPartner\Providers\HashProvider::hashProvider()
     */
    public function testHash($hash, $content)
    {
        $verifyHash = new VerifyHash(self::SECRET_STRING);
        $this->assertEquals($hash, $verifyHash->hash($content));
    }

    /**
     * @dataProvider \RoundPartner\Providers\HashProvider::hashVerifyProvider()
     */
    public function testVerify($hash, $content, $expected)
    {
        $verifyHash = new VerifyHash(self::SECRET_STRING);
        $this->assertEquals($expected, $verifyHash->verify($hash, $content));
    }
}
