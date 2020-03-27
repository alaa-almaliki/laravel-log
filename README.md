# Laravel Log

## Existing Logs

Exception Log

```php
try {
        throw new Exception('Test');
    } catch (Exception $exception) {
        \Enkidu\Log\Facades\ExceptionLogger::logException($exception); // exception.log
    }
```

Debug Log
```php
\Enkidu\Log\Facades\DebugLogger::info('Test'); // debug.log
```

## Creating custom log

* Add logging channel in `config/logging.php`
```php
   'channels' => [
   ...
   'test' => [
        'driver' => 'single',
        'path' => storage_path('logs/test.log'),
        'level' => 'info',
   ],
  ...
]
```

* Create custom logging class
```php
class TestLogger extends BaseLogger
{
    /**
     * @inheritDoc
     */
    protected function getLoggingChannel(): string
    {
        return 'test';
    }
}
```

How to use
```php
$test = new \App\Logger\TestLogger;
 $test->info('Test'); // test.log
```
