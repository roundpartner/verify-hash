<?php

class VerifyHashTest extends PHPUnit_Framework_TestCase
{

    public function testHash()
    {
        $verifyHash = new \VerifyHash\VerifyHash('reallysecurestring');
        $this->assertEquals('dc91e632a81bba220a002d46e06da80dc2753591', $verifyHash->hash('This is a string I want to hash'));
    }

    public function testVerify()
    {
        $verifyHash = new \VerifyHash\VerifyHash('reallysecurestring');
        $this->assertTrue($verifyHash->verify('dc91e632a81bba220a002d46e06da80dc2753591', 'This is a string I want to hash'));
    }

    public function testVerifyFalse()
    {
        $verifyHash = new \VerifyHash\VerifyHash('reallysecurestring');
        $this->assertFalse($verifyHash->verify(false, false));
    }

}