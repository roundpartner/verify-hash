<?php

class VerifyHashTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider \RoundPartner\Providers\HashProvider::hashProvider()
     */
    public function testHash($hash, $content)
    {
        $verifyHash = new RoundPartner\VerifyHash\VerifyHash('reallysecurestring');
        $this->assertEquals($hash, $verifyHash->hash($content));
    }

    /**
     * @dataProvider \RoundPartner\Providers\HashProvider::hashVerifyProvider()
     */
    public function testVerify($hash, $content, $expected)
    {
        $verifyHash = new RoundPartner\VerifyHash\VerifyHash('reallysecurestring');
        $this->assertEquals($expected, $verifyHash->verify($hash, $content));
    }

}