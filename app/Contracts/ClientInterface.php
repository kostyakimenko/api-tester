<?php


namespace app\Contracts;


interface ClientInterface
{
    public function sendRequest(string $method, string $url, array $data = [], array $cookies = []);
}