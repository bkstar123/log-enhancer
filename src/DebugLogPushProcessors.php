<?php
/**
 * DebugLogPushProcessor - push neccessary processors to the monolog instance
 *
 * @author: tuanha
 * @lst-mod: 02-06-2019
 */
namespace Bkstar123\LogEnhancer;

use Psr\Log\LoggerInterface;
use Monolog\Processor\PsrLogMessageProcessor;
use Bkstar123\LogEnhancer\Contracts\LogInstanceModifying;

class DebugLogPushProcessors implements LogInstanceModifying
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke(LoggerInterface $logger)
    {
        $logger->pushProcessor(new PsrLogMessageProcessor);
    }
}
