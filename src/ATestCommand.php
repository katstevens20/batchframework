<?php

namespace Kat\BatchFramework;

use Kat\BatchFramework\Core\BaseCommand;
use Kat\BatchFramework\Core\CommandInterface;

class ATestCommand extends BaseCommand implements CommandInterface
{
    public function execute(array $arguments): void
    {
        $this->logger->info("Info: Test info message");
        $this->logger->debug("Debug: Test debug message");
        echo "This is a test output!\n";
    }
}