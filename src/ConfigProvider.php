<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Lijinhua\HyperfEncryption;

use Lijinhua\HyperfEncryption\Command\GenKeyCommand;
use Lijinhua\HyperfEncryption\Contract\EncryptionInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => [
                EncryptionInterface::class => EncryptionManager::class,
            ],
            'commands'     => [
                GenKeyCommand::class,
            ],
            'annotations'  => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish'      => [
                [
                    'id'          => 'config',
                    'description' => 'The config for lijinhua/hyperf-encryption.',
                    'source'      => __DIR__ . '/../publish/encryption.php',
                    'destination' => BASE_PATH . '/config/autoload/encryption.php',
                ],
            ],
        ];
    }
}
