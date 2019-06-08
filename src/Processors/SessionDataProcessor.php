<?php
/**
 * SessionDataProcessor
 * Add session data to a custom log message
 *
 * @author: tuanha
 * @last-mod: 08-June-2019
 */
namespace Bkstar123\LogEnhancer\Processors;

use Monolog\Processor\ProcessorInterface;

class SessionDataProcessor implements ProcessorInterface
{
	/**
     * @return array The processed records
     */
    public function __invoke(array $records)
    {
    	$records['extra']['session'] = session()->all();
    	return $records;
    }
}