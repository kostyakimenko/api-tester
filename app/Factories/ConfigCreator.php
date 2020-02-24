<?php


namespace app\Factories;


use app\Application;
use app\Contracts\TesterConfigInterface;
use app\Helpers\TesterConfig;
use app\Singleton;
use Exception;

class ConfigCreator extends Singleton
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

    public function createTesterConfig(string $testName): TesterConfigInterface
    {
        $configData = $this->config[$testName]['config'] ?? null;

        if (!$configData) {
            throw new Exception('Invalid config for ' . $testName);
        }

        return new TesterConfig($this->config[$testName]['config']);
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
