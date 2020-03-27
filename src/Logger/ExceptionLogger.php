<?php
/**
 * @copyright 2019 Alaa Al-Maliki
 */

declare(strict_types=1);

namespace Enkidu\Log\Logger;

use Throwable;

/**
 * Class ExceptionLogger
 *
 * @package Currency\Log\Logger
 */
class ExceptionLogger extends BaseLogger
{
    /**
     * @param Throwable $throwable
     */
    public function logException(Throwable $throwable)
    {
        $this->critical($throwable->getMessage());
    }

    /**
     * @return string
     */
    protected function getLoggingChannel(): string
    {
        return 'exception';
    }
}
