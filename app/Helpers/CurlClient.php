<?php


namespace app\Helpers;


use app\Contracts\ClientInterface;
use Exception;

class CurlClient implements ClientInterface
{
    /**
     * @param string $url
     * @param string $method
     * @param array $data
     * @param array $cookies
     * @return array
     * @throws Exception
     */
    public function sendRequest(string $method, string $url, array $data = [], array $cookies = [])
    {
        switch ($method) {
            case 'POST':
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                break;
            case 'GET':
                $curl = curl_init($url . '?' . http_build_query($data));
                break;
            default:
                throw new Exception('Method not allowed');
        }

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        $time = curl_getinfo($curl, CURLINFO_TOTAL_TIME);

        curl_close($curl);

        return [
            'data' => $response,
            'code' => $code,
            'time' => $time
        ];
    }
}
