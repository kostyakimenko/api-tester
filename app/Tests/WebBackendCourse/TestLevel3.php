<?php


namespace app\Tests\WebBackendCourse;


use app\Contracts\ClientInterface;
use app\Contracts\TesterConfigInterface;
use app\Helpers\Log;
use app\Tests\TestAbstract;

class TestLevel3 extends TestAbstract
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var TesterConfigInterface
     */
    private $config;

    public function __construct(ClientInterface $client, TesterConfigInterface $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    public function run()
    {
        $this->testGetBookWithCorrectId();
        $this->testGetBookWithWrongId();

        $this->printResult();
    }

    private function testGetBookWithCorrectId()
    {
        $bookId = 1;
        $this->printHeader("Test: get book with correct id ($bookId)");

        $url = $this->config->get('domain') . $this->config->get('endpoints.getSingleBook', ['bookId' => $bookId]);
        $pathToCookie = $this->config->get('pathToCookie');

        $response = $this->client->sendRequest('GET', $url, $pathToCookie);

        $this->assertStatus($response['code'], 200);
        $this->assertData($response['data'], []); // todo add expected response data
    }

    private function testGetBookWithWrongId()
    {
        $bookId = '%&542dshg';
        $this->printHeader("Test: get book with wrong id ($bookId)");

        $url = $this->config->get('domain') . $this->config->get('endpoints.getSingleBook', ['bookId' => $bookId]);
        $pathToCookie = $this->config->get('pathToCookie');

        $response = $this->client->sendRequest('GET', $url, $pathToCookie);

        $this->assertStatus($response['code'], 400);
        $this->assertData($response['data'], []); // todo add expected response data
    }
}
