<?php


namespace app\Tests\WebBackendCourse;


use app\Contracts\ClientInterface;
use app\Helpers\Log;
use app\Tests\TestAbstract;

class TestLevel3 extends TestAbstract
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var array
     */
    private $config;

    public function __construct(ClientInterface $client, array $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    public function run()
    {
        $this->testGetBooksWithModeAndSearch(10, 'new');
        $this->testGetBooksWithModeAndSearch(10, 'popular');
        $this->testGetBooksWithModeAndSearch(10, 'all');
        $this->testGetBooksWithModeAndSearch(10, 'all', 'programming');
        $this->testGetBooksWithModeAndSearch(10, 'all', 'code');

        $this->printResult();
    }

    private function testGetBooksWithModeAndSearch(int $count, string $mode, string $search = '')
    {
        $mainText = "Test: get $count books with '$mode' mode";
        $searchText = $search ? " and search '$search'" : null;

        Log::info($mainText . $searchText);

        $url = $this->config['domain'] . $this->config['endpoints']['getBooks'];
        $response = $this->client->sendRequest('GET', $url, [
            'count' => $count,
            'mode' => $mode,
            'search' => $search
        ]);

        $this->assertStatus($response['code'], 200);
        $this->assertData($response['data'], []);

        Log::delimiter();
    }
}
