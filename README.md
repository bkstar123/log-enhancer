# log-enhancer

## 1.Requirements  

It is recommended to install this package with PHP version 7.1.3 & higher and Laravel Framework version 5.4.* & higher

## 2.Installation  
    composer require bkstar123/log-enhancer 

## 3.Usage

By default, the package will use a custom channel named as 'bkstar123_log_enhancer' and write log messages to a file named as laravel-bkstar123_log_enhancer-YYYY-MM-DD.log. The default log driver is 'daily' and rotation period is 7 days.  

You can customize the base name of log files and the rotation period by adding the following environment settings in .env file:  
- BKSTAR123_LOG_ENHANCER_LOG_NAME  
- BKSTAR123_LOG_ENHANCER_DAYS_FOR_ROTATION  

It is not necessary but you can also change the custom channel name with BKSTAR123_LOG_ENHANCER_CHANNEL setting in .env file  

### To write a log message, call to log() method of DebugLog facade as follows:  
    DebugLog::log($level = '', string $message = '', array $context = [])

where $level can be debug|info|notice|warning|error|critical|emergency (default to 'debug' level)  

### Example:  
    DebugLog::log('info', "Hello {n}", ['n' => 'Antony Hoang'])

### Log messages are formatted as follows:  
    [%datetime%] [%channel%.%level_name%] [PID# pid] [ControllerName/ActionName]
    [%message%]

where %channel% is the value of APP_ENV setting in .env file, %level_name% is the value of $level  