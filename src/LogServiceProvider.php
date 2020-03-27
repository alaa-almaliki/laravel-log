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
            foreach ($this->getLogChannels() as $channel => $config) {
                $this->app['config']->set('logging.channels.'.$channel, $config);
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
