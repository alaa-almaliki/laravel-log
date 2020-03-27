<?php

declare(strict_types=1);

namespace Enkidu\Log\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DebugLogger
 *
 * @package Enkidu\Log\Facades
 */
class DebugLogger extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'debugLogger';
    }
}
