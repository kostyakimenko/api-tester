<?php


namespace app\Helpers;


use app\Contracts\TesterConfigInterface;

class TesterConfig implements TesterConfigInterface
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function get(string $key, array $params = [])
    {
        $config = $this->getConfigByEndingKey($key);

        return $this->getConfigWithParams($config, $params);
    }

    private function getConfigByEndingKey(string $key)
    {
        $keys = explode('.', $key);
        $config = $this->data[$keys[0]];

        for ($i  = 1; $i < count($keys); $i++) {
            $config = $config[$keys[$i]];
        }

        return $config;
    }

    private function getConfigWithParams(string $config, array $params)
    {
        foreach ($params as $key => $value ) {
            $config = str_replace(":$key", $value, $config);
        }

        return $config;
    }
}
