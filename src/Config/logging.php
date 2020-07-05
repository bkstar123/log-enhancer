<?php
/**
 * Configuration file
 * It is merged with application's logging.php config file
 *
 * @author: tuanha
 * @last-mod: 08-June-2019
 */

return [
    'bkstar123_log_enhancer' => [
        'log_to_browser_console' => env('BKSTAR123_LOG_ENHANCER_TO_BROWSER_CONSOLE', false),
        'channel_name' => env('BKSTAR123_LOG_ENHANCER_CHANNEL', 'bkstar123_log_enhancer'),
        'log_filename' => env('BKSTAR123_LOG_ENHANCER_LOG_NAME', 'laravel-bkstar123_log_enhancer.log'),
        'days_for_rotation' => env('BKSTAR123_LOG_ENHANCER_DAYS_FOR_ROTATION', 7),
    ],
];
