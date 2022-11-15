<?php

namespace Kat\BatchFramework\Core;

use Psr\Log\LoggerInterface;

class BaseCommand
{
    protected LoggerInterface $logger;

    public function addLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
        return $this;
    }
}