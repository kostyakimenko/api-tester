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

    protected function increaseCounter(bool $isError = false)
    {
        $this->testCount++;

        if ($isError) {
            $this->errorCount++;
        }
    }

    protected function printTestResult(array $data, bool $isError = false)
    {
        if ($isError) {
            Log::error('Status: error');
        } else {
            Log::success('Status: OK');
        }

        Log::info('Code: ' . $data['code']);
        Log::info('Time: ' . $data['time']);
        Log::info('Data: ' . $data['data']);
        Log::info('');
    }

    protected function printFinishResult()
    {
        Log::result('All test: ' . $this->testCount);
        Log::result('Passed test: ' . ($this->testCount - $this->errorCount));
    }
}
