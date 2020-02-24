<?php


namespace app\Contracts;


interface TesterConfigInterface
{
    public function get(string $key, array $params = []);
}