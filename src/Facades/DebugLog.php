<?php
/**
 * DebugLogFacade
 *
 * @author: tuanha
 * @last-mod: 02-06-2019
 */
namespace Bkstar123\LogEnhancer\Facades;

use Illuminate\Support\Facades\Facade;

class DebugLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'debugLog';
    }
}
