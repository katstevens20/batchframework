<?php

namespace Kat\BatchFramework;

use Kat\BatchFramework\Core\BaseCommand;
use Kat\BatchFramework\Core\CommandInterface;

class ATestCommand extends BaseCommand implements CommandInterface
{
    public function execute(array $arguments): void
    {
        echo "This is a test output!";
    }
}