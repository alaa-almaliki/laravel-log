<?php

declare(strict_types=1);

namespace Enkidu\Log\Logger;

use Enkidu\Log\Traits\Loggable;
use InvalidArgumentException;
use Psr\Log\LoggerInterface;

/**
 * Class BaseLogger
 *
 * @package Enkidu\Log\Logger
 */
abstract class BaseLogger
{
    use Loggable;

    /**
     * @param string $name
     * @param array $arguments
     */
    public function __call($name, $arguments)
    {
        if (! in_array($name, $this->getAllowedMethods())) {
            throw new InvalidArgumentException(__('method :method is not defined.', ['method' => $name]));
        }

        $this->getLogger()->$name(...array_values($arguments));
    }

    /**
     * @return array
     */
    protected function getAllowedMethods(): array
    {
        return get_class_methods(LoggerInterface::class);
    }
}
