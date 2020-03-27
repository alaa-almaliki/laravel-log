<?php

declare(strict_types=1);

namespace Enkidu\Log\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Exception
 *
 * @package Enkidu\Log\Facades
 */
class ExceptionLogger extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'exceptionLogger';
    }
}
