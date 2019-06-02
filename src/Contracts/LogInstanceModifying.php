<?php
/**
 * LogInstanceModifying interface
 *
 * @author: tuanha
 * @last-mod: 02-06-2019
 */

namespace Bkstar123\LogEnhancer\Contracts;

use Psr\Log\LoggerInterface;

/**
 * @param  \Psr\Log\LoggerInterface  $logger
 */
interface LogInstanceModifying
{
    public function __invoke(LoggerInterface $logger);
}
