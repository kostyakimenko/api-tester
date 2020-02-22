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

    protected function printFinishResult()
    {
        Log::result('All test: ' . $this->testCount);
        Log::result('Passed test: ' . ($this->testCount - $this->errorCount));
    }

    protected function assertResponseStatus(int $actual, int $expected)
    {
        $this->testCount++;

        Log::info('Checking response status...');
        $logMessage = "expected: $expected; actual: $actual";

        if ($actual === $expected) {
            Log::success($logMessage);
        } else {
            Log::error($logMessage);
            $this->errorCount++;
        }
    }
}
