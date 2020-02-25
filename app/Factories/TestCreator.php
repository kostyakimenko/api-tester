<?php


namespace app\Factories;


use app\Factories\ConfigCreator;
use app\Helpers\CurlClient;
use app\Tests\AbstractTest;

class TestCreator
{
    public static function create(string $testName): AbstractTest
    {
        $client = new CurlClient();
        $config = ConfigCreator::getInstance();
        $tester = $config->getTesterClass($testName);
        $testerConfig = $config->createTesterConfig($testName);

        return new $tester($client, $testerConfig);
    }
}
