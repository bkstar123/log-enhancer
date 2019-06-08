<?php
/**
 * DebugLogPushProcessor - push additional processors
 *
 * @author: tuanha
 * @lst-mod: 02-06-2019
 */
namespace Bkstar123\LogEnhancer;

use Psr\Log\LoggerInterface;
use Monolog\Processor\WebProcessor;
use Monolog\Processor\ProcessIdProcessor;
use Monolog\Processor\PsrLogMessageProcessor;
use Bkstar123\LogEnhancer\Contracts\LogInstanceModifying;
use Bkstar123\LogEnhancer\Processors\SessionDataProcessor;
use Bkstar123\LogEnhancer\Processors\RouteHandlerProcessor;

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
        $logger->pushProcessor(new WebProcessor);
        $logger->pushProcessor(new ProcessIdProcessor);
        $logger->pushProcessor(new SessionDataProcessor);
        $logger->pushProcessor(new RouteHandlerProcessor);
        $logger->pushProcessor(new PsrLogMessageProcessor);
    }
}
