<?php
/**
 * DebugLog service - write user debug messages to a custom debug channel
 *
 * @author: tuanha
 * @last-mod: 02-06-2019
 */
namespace Bkstar123\LogEnhancer;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class DebugLog
{
    /**
     * @var \Illuminate\Log\Logger
     *
     */
    protected $customLogger;

    /**
     * Get the logger instance of custom channel
     *
     */
    public function __construct()
    {
        $log_enhancer_channel_name = config('logging.bkstar123_log_enhancer.channel_name');
        $this->customLogger = Log::channel($log_enhancer_channel_name);
    }

    /**
     * Write a user debug message to a custom debug channel
     *
     * @param  string  $level  debug|info|notice|warning|error|critical|emergency  default  ''
     * @param  string  $message  default  empty
     * @param  array  $context  default  empty
     * @return void
     */
    public function log($level = '', string $message = '', array $context = [])
    {
        if (!App::environment('production')) {
            if (method_exists($this->customLogger, $level)) {
                call_user_func_array([$this->customLogger, $level], [$message, $context]);
            } else {
                $this->customLogger->debug($message, $context);
            }
        }
    }
}
