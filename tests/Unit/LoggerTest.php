<?php

declare(strict_types=1);

namespace Enkidu\Log\Test\Unit;

use Enkidu\Log\Facades\ExceptionLogger;
use Enkidu\Log\Facades\DebugLogger;
use Orchestra\Testbench\TestCase;
use TiMacDonald\Log\LogFake;

/**
 * Class LoggerTest
 *
 * @package Enkidu\Log\Test\Unit
 */
class LoggerTest extends TestCase
{
    /**
     * @test
     */
    public function exception_logger()
    {
        ExceptionLogger::swap(new LogFake());
        ExceptionLogger::critical('Test');
        ExceptionLogger::assertLogged('critical', function ($message, $context) {
            return stripos($message, 'Test') !== false;
        });
    }

    /**
     * @test
     */
    public function debug_logger()
    {
        DebugLogger::swap(new LogFake());
        DebugLogger::debug('Test');
        DebugLogger::assertLogged('debug', function ($message, $context) {
            return stripos($message, 'Test') !== false;
        });
    }
}