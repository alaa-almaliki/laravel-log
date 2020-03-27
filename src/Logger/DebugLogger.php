<?php

declare(strict_types=1);

namespace Enkidu\Log\Logger;

/**
 * Class DebugLogger
 *
 * @package Enkidu\Log\Logger
 */
class DebugLogger extends BaseLogger
{
    /**
     * @return string
     */
    protected function getLoggingChannel(): string
    {
        return 'debug';
    }
}
