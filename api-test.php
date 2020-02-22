<?php

// Class autoloader
spl_autoload_register(function($class) {
    require __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});

use app\Helpers\Log;
use app\Tests\TestFactory;

$testName = $argv[2] ?? null;

if (!$testName) {
    Log::error('Test not specified in params');
} else {
    try {
        TestFactory::make($testName)->run();
    } catch (Exception $exception) {
        Log::error($exception->getMessage());
    }
}
