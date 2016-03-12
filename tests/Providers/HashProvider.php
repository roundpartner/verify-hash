<?php

namespace RoundPartner\Providers;

class HashProvider
{
    public static function hashProvider()
    {
        return array(
            ['dc91e632a81bba220a002d46e06da80dc2753591', 'This is a string I want to hash'],
        );
    }

    public static function hashVerifyProvider()
    {
        return array(
            ['dc91e632a81bba220a002d46e06da80dc2753591', 'This is a string I want to hash', true],
            [false, false, false],
            ['', '', false],
            ['', false, false],
            ['dc91e632a81bba220a002d46e06da80dc2753591', 'This is invalid', false],
        );
    }
}
