<?php

class VerifyHashTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider \Providers\HashProvider::hashProvider()
     */
    public function testHash($hash, $content)
    {
        $verifyHash = new \VerifyHash\VerifyHash('reallysecurestring');
        $this->assertEquals($hash, $verifyHash->hash($content));
    }

    /**
     * @dataProvider \Providers\HashProvider::hashVerifyProvider()
     */
    public function testVerify($hash, $content, $expected)
    {
        $verifyHash = new \VerifyHash\VerifyHash('reallysecurestring');
        $this->assertEquals($expected, $verifyHash->verify($hash, $content));
    }

}