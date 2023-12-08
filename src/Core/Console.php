<?php

namespace Kat\BatchFramework\Core;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Component\Dotenv\Dotenv;
use Exception;
use Throwable;

class Console
{
    public function __invoke($arguments, $envFilePath)
    {
        $logger = null;
        try {
            $launcher = array_shift($arguments);
            $commandClassName = array_shift($arguments);
            if (!$commandClassName) {
                throw new Exception("No command specified as an argument.");
            }

            //$envFilePath = __DIR__ . '/../.env';
            if (!file_exists($envFilePath)) {
                throw new Exception("Please ensure that an .env file is in the root directory");
            }
            // Load conf file: .env
            $config = new Dotenv(true);
            $config->load($envFilePath);

            // Set logger for app
            $loggerName = Helper::getBaseClass($commandClassName);
            $logger = new Logger($loggerName);
            $handler = new StreamHandler(Config::getParam('MAIN_LOG'), Config::getParam('APP_DEBUG') == 'true' ? Logger::DEBUG : Logger::INFO);
            $handler->setFormatter(new LineFormatter(Config::getParam('LOG_FORMATTER')));
            $logger->pushHandler($handler); // 'php://stderr'

            // Run app
            $runner = new Runner;
            if (!class_exists($commandClassName)) {
                throw new Exception("$commandClassName does not exist.");
            }
            $runner(new $commandClassName(), $arguments, $logger);

        } catch (Throwable $e) {
            throw $e;
        }
    }
}