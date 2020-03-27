<?php

declare(strict_types=1);

namespace Enkidu\Log;

use Enkidu\Log\Logger\DebugLogger;
use Enkidu\Log\Logger\ExceptionLogger;
use Illuminate\Support\ServiceProvider;

/**
 * Class LogServiceProvider
 *
 * @package Enkidu\Log
 */
class LogServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    public $singletons = [
        'debugLogger' => DebugLogger::class,
        'exceptionLogger' => ExceptionLogger::class,
    ];

    public function boot()
    {
        if (! $this->app->configurationIsCached()) {
            foreach ($this->getLogChannels() as $channel) {
                $this->app['config']->set($this->key, array_merge(
                    $channel,
                    $this->app['config']->get($this->key, [])
                ));
            }
        }
    }

    /**
     * @return array
     */
    public function getLogChannels(): array
    {
        return [
            'debug' => [
                'driver' => 'single',
                'path' => storage_path('logs/debug.log'),
                'level' => 'debug',
            ],
            'exception' => [
                'driver' => 'single',
                'path' => storage_path('logs/exception.log'),
                'level' => 'critical',
            ],
        ];
    }
}