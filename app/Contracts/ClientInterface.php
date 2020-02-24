<?php


namespace app\Contracts;


interface ClientInterface
{
    public function sendRequest(string $method, string $url, string $pathToCookie, array $data = []);
}
