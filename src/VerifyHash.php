<?php

namespace RoundPartner\VerifyHash;

class VerifyHash
{

    const DEFAULT_ALGORITHM = 'sha1';

    /**
     * @var string
     */
    protected $secret;

    /**
     * VerifyHash constructor.
     *
     * @param string $secret
     */
    public function __construct($secret)
    {
        $this->secret = $secret;
    }

    /**
     * Creates a hash from the content and secret
     *
     * @param string $content
     * @param string $algorithm
     *
     * @return bool|string
     */
    public function hash($content, $algorithm = self::DEFAULT_ALGORITHM)
    {
        if (!is_string($content)) {
            return false;
        }

        if (!in_array($algorithm, hash_algos(), true)) {
            return false;
        }

        return hash_hmac($algorithm, $content, $this->secret);
    }

    /**
     * Verifies that content and hash match
     *
     * @param string $hash
     * @param string $content
     * @param string $algorithm
     *
     * @return bool
     */
    public function verify($hash, $content, $algorithm = self::DEFAULT_ALGORITHM)
    {
        if (empty($hash)) {
            return false;
        }
        return $this->hashEquals($hash, $this->hash($content, $algorithm));
    }

    /**
     * String comparison for hashes
     *
     * @param string $knownString
     * @param string $userString
     *
     * @return bool
     */
    private function hashEquals($knownString, $userString)
    {
        if (function_exists('hash_equals')) {
            return hash_equals($knownString, $userString);
        }

        if (strlen($knownString) !== strlen($userString)) {
            return false;
        }

        $res = $knownString ^ $userString;
        $ret = 0;
        for ($i = strlen($res) - 1; $i >= 0; $i--) {
            $ret |= ord($res[$i]);
        }
        return !$ret;
    }
}
