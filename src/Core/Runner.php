<?php

namespace Kat\BatchFramework\Core;

use Exception;
use Kat\BatchFramework\Exceptions\ArgumentNotFountRuntimeApplicationException;
use Kat\BatchFramework\Exceptions\CommandNotFoundRuntimeApplicationException;
use Kat\BatchFramework\Infra\Database\DbManager;
use Kat\BatchFramework\Infra\Database\DbManagerInterface;
use Psr\Log\LoggerInterface;

class Runner
{
    public function __invoke(CommandInterface $command, array $arguments, LoggerInterface $logger)
    {
        try {
            $command->addLogger($logger);
            $command->execute($arguments);

        } catch (Exception $e) {
            throw $e;
        }
    }
}