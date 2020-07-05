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
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Bkstar123\LogEnhancer\DebugLogPushHandlers;
use Bkstar123\LogEnhancer\DebugLogSetFormatter;
use Bkstar123\LogEnhancer\DebugLogPushProcessors;
use Bkstar123\LogEnhancer\Facades\DebugLog as DebugLogFacade;

class DebugLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $log_enhancer_channel_name = config('logging.bkstar123_log_enhancer.channel_name');
        $log_enhancer_log_file_name = config('logging.bkstar123_log_enhancer.log_filename');

        Config::set('logging.channels.' . $log_enhancer_channel_name, [
            'driver' => 'daily',
            'tap' => [
                DebugLogPushHandlers::class,
                DebugLogPushProcessors::class,
                DebugLogSetFormatter::class,
            ],
            'path' => storage_path('logs/'. $log_enhancer_log_file_name),
            'level' => 'debug',
            'days' => config('logging.bkstar123_log_enhancer.days_for_rotation'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::singleton('debugLog', function ($app) {
            return new DebugLog;
        });

        $loader = AliasLoader::getInstance();
        $loader->alias('DebugLog', DebugLogFacade::class);

        $this->mergeConfigFrom(__DIR__.'/Config/logging.php', 'logging');
    }
}
