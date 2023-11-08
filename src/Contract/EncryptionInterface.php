<?php

declare(strict_types=1);

namespace Lijinhua\HyperfEncryption\Contract;

interface EncryptionInterface extends DriverInterface
{
    /**
     * Get a driver instance.
     *
     * @param  string|null  $name
     * @return DriverInterface
     */
    public function getDriver(?string $name = null): DriverInterface;
}
