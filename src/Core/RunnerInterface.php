<?php

namespace Kat\BatchFramework\Core;


use Psr\Log\LoggerInterface;

interface RunnerInterface
{
    public function run(CommandInterface $commandClass, array $arguments, LoggerInterface $logger): void;
}