<?php

declare(strict_types=1);

namespace Lijinhua\HyperfEncryption;

use Hyperf\Contract\ConfigInterface;
use InvalidArgumentException;
use Lijinhua\HyperfEncryption\Contract\AsymmetricDriverInterface;
use Lijinhua\HyperfEncryption\Contract\DriverInterface;
use Lijinhua\HyperfEncryption\Contract\EncryptionInterface;
use Lijinhua\HyperfEncryption\Contract\SymmetricDriverInterface;
use Lijinhua\HyperfEncryption\Driver\AesDriver;

class EncryptionManager implements EncryptionInterface
{
    /**
     * The config instance.
     *
     * @var \Hyperf\Contract\ConfigInterface
     */
    protected $config;

    /**
     * The array of created "drivers".
     *
     * @var DriverInterface[]
     */
    protected $drivers = [];

    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    public function encrypt($value, bool $serialize = true): string
    {
        return $this->getDriver()->encrypt($value, $serialize);
    }

    public function decrypt(string $payload, bool $unserialize = true)
    {
        return $this->getDriver()->decrypt($payload, $unserialize);
    }

    /**
     * Get a driver instance.
     *
     * @return AsymmetricDriverInterface|SymmetricDriverInterface|DriverInterface
     */
    public function getDriver(?string $name = null): DriverInterface
    {
        if (isset($this->drivers[$name]) && $this->drivers[$name] instanceof DriverInterface) {
            return $this->drivers[$name];
        }

        $name = $name ?: $this->config->get('encryption.default', 'aes');

        $config = $this->config->get("encryption.driver.{$name}");
        if (empty($config) or empty($config['class'])) {
            throw new InvalidArgumentException(sprintf('The encryption driver config %s is invalid.', $name));
        }

        $driverClass = $config['class'] ?? AesDriver::class;

        $driver = \Hyperf\Support\make($driverClass, ['options' => $config['options'] ?? []]);

        return $this->drivers[$name] = $driver;
    }
}
