<?php


namespace app\Tests;


use app\Helpers\Log;

abstract class TestAbstract
{
    /**
     * @var int
     */
    protected $testCount = 0;

    /**
     * @var int
     */
    protected $errorCount = 0;

    abstract public function run();

    protected function assertStatus(int $actual, int $expected)
    {
        $logMessage = "expected status: $expected; actual status: $actual";
        $this->handleResult($logMessage, $actual, $expected);
    }

    protected function assertData(?array $actual, array $expected)
    {
        $actualStr = json_encode($actual);
        $expectedStr = json_encode($expected);
        $logMessage = "expected data: $expectedStr; actual data: $actualStr";
        $this->handleResult($logMessage, $actual, $expected);
    }

    private function handleResult(string $message, $actual, $expected)
    {
        $this->testCount++;

        if ($actual === $expected) {
            Log::success($message);
        } else {
            Log::error($message);
            $this->errorCount++;
        }
    }

    protected function printResult()
    {
        Log::delimiter();
        Log::result('All tests: ' . $this->testCount);
        Log::result('Passed tests: ' . ($this->testCount - $this->errorCount));
    }

    protected function printHeader(string $header)
    {
        Log::delimiter();
        Log::info($header);
    }
}
