<?php
/**
 * DebugLogSetFormatter - set a custom formatter for the monolog instance
 *
 * @author: tuanha
 * @lst-mod: 02-06-2019
 */
namespace Bkstar123\LogEnhancer;

use Psr\Log\LoggerInterface;
use Monolog\Formatter\LineFormatter;
use Illuminate\Support\Facades\Route;
use Bkstar123\LogEnhancer\Contracts\LogInstanceModifying;

class DebugLogSetFormatter implements LogInstanceModifying
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke(LoggerInterface $logger)
    {
        $output = "[%datetime%] [%channel%.%level_name%] [PID# ".getmypid()."] [".Route::currentRouteAction()."]"."\n[%message%]\n";

        $formatter = new LineFormatter($output, null, true);

        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter($formatter);
        }
    }
}
