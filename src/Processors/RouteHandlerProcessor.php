<?php
/**
 * RouteHandlerProcessor
 * Add the name of the invoked route handler to a custom log message
 *
 * @author: tuanha
 * @last-mod: 08-June-2019
 */
namespace Bkstar123\LogEnhancer\Processors;

use Illuminate\Support\Facades\Route;
use Monolog\Processor\ProcessorInterface;

class RouteHandlerProcessor implements ProcessorInterface
{
    /**
     * @return array The processed records
     */
    public function __invoke(array $records)
    {
        $records['extra']['route_handler'] = Route::currentRouteAction();
        return $records;
    }
}
