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
        $output = "[%datetime% " . config('app.timezone') . "] [%channel%.%level_name%]: %message%\n";

        $output .= "{'pid': '%extra.process_id%', 'client_ip': '%extra.ip%', 'url': '%extra.url%', 'http_method': '%extra.http_method%', 'route_hanlder': '%extra.route_handler%'";

        $output .= ", \n'session': %extra.session%";

        $output .= "}\n\n";

        $formatter = new LineFormatter($output, null, true);

        foreach ($logger->getHandlers() as $handler) {
            $handler->setFormatter($formatter);
        }
    }
}
