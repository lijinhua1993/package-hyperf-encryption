<?php

declare(strict_types=1);

namespace Lijinhua\HyperfEncryption\Contract;

interface SymmetricDriverInterface extends DriverInterface
{
    public function getKey(): string;

    public static function generateKey(array $options = []): string;
}
