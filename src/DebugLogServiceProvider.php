<?php
/**
 * DebugLogServiceProvider
 *
 * @author: tuanha
 * @last-mod: 02-06-2019
 */
namespace Bkstar123\LogEnhancer;

use Bkstar123\LogEnhancer\DebugLog;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class DebugLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('debugLog', function ($app) {
            return new DebugLog;
        });
    }
}
