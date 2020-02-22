<?php


namespace app\Tests;


use app\Helpers\Config;
use app\Helpers\CurlClient;

class TestFactory
{
    public static function make(string $testName): TestAbstract
    {
        $client = new CurlClient();
        $config = Config::getInstance();
        $tester = $config->getTesterClass($testName);
        $testerConfig = $config->getTesterConfig($testName);

        return new $tester($client, $testerConfig);
    }
}
