<?php
/**
 * DebugLogPushHandlers - push additional handlers
 *
 * @author: tuanha
 * @lst-mod: 02-06-2019
 */
namespace Bkstar123\LogEnhancer;

use Psr\Log\LoggerInterface;
use Monolog\Handler\BrowserConsoleHandler;
use Bkstar123\LogEnhancer\Contracts\LogInstanceModifying;

class DebugLogPushHandlers implements LogInstanceModifying
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke(LoggerInterface $logger)
    {
        if (config('logging.bkstar123_log_enhancer.log_to_browser_console')) {
            $logger->pushHandler(new BrowserConsoleHandler);
        }
        return;
    }
}
