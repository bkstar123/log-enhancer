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
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Bkstar123\LogEnhancer\DebugLogSetFormatter;
use Bkstar123\LogEnhancer\DebugLogPushProcessors;

class DebugLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $log_enhancer_channel_name = env('BKSTAR123_LOG_ENHANCER_CHANNEL', 'bkstar123_log_enhancer');
        $log_enhancer_log_file_name = env('BKSTAR123_LOG_ENHANCER_LOG_NAME', 'laravel-' . 
            $log_enhancer_channel_name . '.log');

        Config::set('logging.channels.' . $log_enhancer_channel_name, [
            'driver' => 'daily',
            'tap' => [
                DebugLogPushProcessors::class,
                DebugLogSetFormatter::class,
            ],
            'path' => storage_path('logs/'. $log_enhancer_log_file_name),
            'level' => 'debug',
            'days' => env('BKSTAR123_LOG_ENHANCER_DAYS_FOR_ROTATION', 7),
        ]);
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
