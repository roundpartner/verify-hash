<?php

namespace RoundPartner\Test\Providers;

class HashProvider
{
    public static function hashProvider()
    {
        return array(
            ['e6e83f12b09a0684979efc4a6de98e10f64a6ee7', 'This is a string I want to hash'],
        );
    }

    public static function hashVerifyProvider()
    {
        return array(
            ['e6e83f12b09a0684979efc4a6de98e10f64a6ee7', 'This is a string I want to hash', true],
            [false, false, false],
            ['', '', false],
            ['', false, false],
            ['e6e83f12b09a0684979efc4a6de98e10f64a6ee7', 'This is invalid', false],
        );
    }
}
