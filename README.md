# log-enhancer

## 1.Requirements  

It is recommended to install this package with PHP version 7.1.3+ and Laravel Framework version 5.6+  

## 2.Installation  
    composer require bkstar123/log-enhancer 

## 3.Usage

By default, the package will use a custom channel named as `bkstar123_log_enhancer` and write log messages to a file named as `laravel-bkstar123_log_enhancer-YYYY-MM-DD.log`. The default log driver is `daily` and rotation period is 7 days.  

You can customize the base name of log files and the rotation period by adding the following environment settings in .env file:  
- ```BKSTAR123_LOG_ENHANCER_LOG_NAME```    
- ```BKSTAR123_LOG_ENHANCER_DAYS_FOR_ROTATION``` (in days)   

It is not necessary but you can also change the custom channel name with `BKSTAR123_LOG_ENHANCER_CHANNEL` setting in .env file  

You can also write custom log messages to browser Javascript console with no browser extension required. Most browsers supporting console API are supported  

To do so, just add the following environment setting in .env file:  
```BKSTAR123_LOG_ENHANCER_TO_BROWSER_CONSOLE=true```

To write a log message, call to log() method of DebugLog facade as follows:  
```DebugLog::log($level = '', string $message = '', array $context = [])```

**Note**: **DebugLog** alias is automatically registered, so you do not need to add it in the `config/app.php`

where $level can be ```debug|info|notice|warning|error|critical|emergency``` (default to `debug` level)  

### Example:  
```php
DebugLog::log('info', "Hello {n}", ['n' => 'Antony Hoang'])
```

### Log messages are enhanced with the following data:  
**datetime** (with the system timezone): date and time of log messages  
**channel**: value of APP_ENV setting in .env file  
**level_name**: value of $level  
**message**: your custom log message  
**pid**: the process ID of the PHP thread serving the current request  
**client_ip**: the IP address of the client browser  
**url**: request path  
**http_method**: HTTP verb of the current request e.g: GET, POST ...  
**route_hanlder**: the name of the request route handler i.e `ControllerName/ActionName`  
**session**: the session data associated with the request  

### Sample log message:
    [2019-06-08 11:08:43 UTC] [local.INFO]: Hello Antony Hoang
    {'pid': '2873', 'client_ip': '192.168.1.35', 'url': '/', 'http_method': 'GET', 'route_hanlder': 'App\Http\Controllers\TestController@test', 
    'session': {"_token":"aSKrQ8xXETX5Mywt3EoLMqTG6SfOA6M4Vc5yGyDC","_previous":{"url":"http://kpacks.acme.com"},"_flash":{"old":[],"new":[]}}}