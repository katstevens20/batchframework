<?php

namespace Application;

use Kat\BatchFramework\ATestCommand;
use Kat\BatchFramework\Core\Runner;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;
use tests\Application\NoOpLogger;

class ApplicationTest extends TestCase
{

    private Runner $runner;
    private $logger;
    public function setUp(): void
    {
        $this->logger = new NoOpLogger();
        $config = new Dotenv(true);
        $config->load(__DIR__ . '/../../.env');
        $this->runner = new Runner();
    }


    /*
        public function testRunApplicationNoArgumentFail(): void
        {
            $this->expectException(ArgumentNotFountRuntimeApplicationException::class);
            $this->runner->run(['php bin/console'], $this->logger);
        }
    */
    public function testApplicationCanBeInstantiated(): void
    {
        $this->assertInstanceOf(Runner::class, $this->runner);
    }

    /**
     * @throws ArgumentNotFountRuntimeApplicationException

    public function testApplicationRunCommandFail(): void
    {
        $this->expectException(CommandNotFoundRuntimeApplicationException::class);
        $this->application->run(['php bin/console', 'ATestCommand']);
    }

    public function testApplicationRunCommandSuccess(): void
    {
        $this->runner->run(new ATestCommand(), [], $this->logger);
        $this->expectOutputString("This is a test output!");
    }*/
}