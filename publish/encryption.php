<?php

declare(strict_types=1);

return [
    'default' => 'aes',

    'driver' => [
        'aes' => [
            'class'   => \Lijinhua\HyperfEncryption\Driver\AesDriver::class,
            'options' => [
                'key'    => \Hyperf\Support\env('AES_KEY', ''),
                'cipher' => 'AES-128-CBC',
            ],
        ],
    ],
];
