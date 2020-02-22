<?php


namespace app\Helpers;


use app\Application;
use app\Singleton;

class Config extends Singleton
{
    /**
     * @var array
     */
    private $config;

    protected function __construct()
    {
        $this->config = $this->parseConfigFiles();
    }

    public function getTesterClass(string $testName)
    {
        return $this->config[$testName]['tester'] ?? null;
    }

    public function getTesterConfig(string $testName)
    {
        return $this->config[$testName]['config'] ?? null;
    }

    private function parseConfigFiles()
    {
        $config = require_once Application::TEST_MAIN_CONFIG_PATH;

        foreach ($config as $key => &$value) {
            $value['config'] = require_once $value['config'];
        }
        unset($value);

        return $config;
    }
}
