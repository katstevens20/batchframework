<?php

namespace Kat\BatchFramework\Core;

use Kat\BatchFramework\Infra\Database\DbManagerInterface;
use Psr\Log\LoggerInterface;

interface CommandInterface
{
    public function addLogger(LoggerInterface $logger);
    public function execute(array $argument);
}