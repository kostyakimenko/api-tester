<?php


namespace app\Tests;


use app\Contracts\ClientInterface;
use app\Helpers\Config;

class TestFactory
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $testName;

    /**
     * TestFactory constructor.
     * @param string $testName
     * @param ClientInterface $client
     */
    public function __construct(string $testName, ClientInterface $client)
    {
        $this->testName = $testName;
        $this->client = $client;
    }

    /**
     * Make test object
     * @return TestAbstract
     */
    public function make(): TestAbstract
    {
        $config = Config::getInstance();
        $tester = $config->getTesterClass($this->testName);
        $testerConfig = $config->getTesterConfig($this->testName);

        return new $tester($this->client, $testerConfig);
    }
}
