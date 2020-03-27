<?php

declare(strict_types=1);

namespace Enkidu\Log\Traits;

use Enkidu\Log\Contracts\LoggerInterface;
use Enkidu\Log\Logger\Logger;

/**
 * Trait Loggable
 *
 * @package Enkidu\Log\Traits
 */
trait Loggable
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        if (null === $this->logger) {
            $this->logger = new Logger($this->getLoggingChannel());
        }

        return $this->logger;
    }

    /**
     * @return string
     */
    abstract protected function getLoggingChannel(): string;
}
