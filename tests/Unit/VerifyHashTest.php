<?php

namespace RoundPartner\Unit;

use \RoundPartner\VerifyHash\VerifyHash;

class VerifyHashTest extends \PHPUnit_Framework_TestCase
{
    const SECRET_STRING = 'this is my secret';

    /**
     * @var VerifyHash
     */
    protected $verifyHash;


    public function setUp()
    {
        $this->verifyHash = new VerifyHash(self::SECRET_STRING);
    }

    /**
     * @dataProvider \RoundPartner\Providers\HashProvider::hashProvider()
     */
    public function testHash($hash, $content)
    {
        $this->assertEquals($hash, $this->verifyHash->hash($content));
    }

    public function testHashNotString()
    {
        $this->assertFalse($this->verifyHash->hash(true));
    }

    public function testHashAlgorithmDoesNotExist()
    {
        $this->assertFalse($this->verifyHash->hash(self::SECRET_STRING, 'test'));
    }

    /**
     * @dataProvider \RoundPartner\Providers\HashProvider::hashVerifyProvider()
     */
    public function testVerify($hash, $content, $expected)
    {
        $this->assertEquals($expected, $this->verifyHash->verify($hash, $content));
    }
}
