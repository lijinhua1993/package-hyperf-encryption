<?php

declare(strict_types=1);

namespace Lijinhua\HyperfEncryption\Contract;

use Lijinhua\HyperfEncryption\Exception\DecryptException;
use Lijinhua\HyperfEncryption\Exception\EncryptException;

interface DriverInterface
{
    /**
     * Encrypt the given value.
     *
     * @param  mixed  $value
     * @param  bool  $serialize
     * @return string
     * @throws EncryptException
     */
    public function encrypt($value, bool $serialize = true): string;

    /**
     * Decrypt the given value.
     *
     * @param  string  $payload
     * @param  bool  $unserialize
     * @return mixed
     * @throws DecryptException
     */
    public function decrypt(string $payload, bool $unserialize = true);
}
