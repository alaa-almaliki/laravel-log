<?php

declare(strict_types=1);

namespace Enkidu\Log\Contracts;

/**
 * Interface LoggerInterface
 *
 * @package Enkidu\Log\Contracts
 */
interface LoggerInterface extends \Psr\Log\LoggerInterface
{
    /**
     * @param string $channel
     */
    public function setChannel(string $channel): void;

    /**
     * @return string
     */
    public function getChannel(): string;
}
