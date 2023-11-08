<?php
declare(strict_types=1);

use Lijinhua\HyperfEncryption\Crypt;

if (!function_exists('encrypt')) {
    /**
     * Encrypt the given value.
     *
     * @param  mixed  $value
     * @param  bool  $serialize
     * @return string
     */
    function encrypt($value, $serialize = true)
    {
        return Crypt::encrypt($value, $serialize);
    }
}

if (!function_exists('decrypt')) {
    /**
     * Decrypt the given value.
     *
     * @param  string  $value
     * @param  bool  $unserialize
     * @return mixed
     */
    function decrypt($value, $unserialize = true)
    {
        return Crypt::decrypt($value, $unserialize);
    }
}