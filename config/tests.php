<?php

return [
    'web-backend-level1' => [
        'tester' => \app\Tests\WebBackendCourse\TestLevel1::class,
        'config' => \app\Application::WEB_BACKEND_COURSE_CONFIG_PATH . 'level1.php'
    ],

    'web-backend-level2' => [
        'tester' => \app\Tests\WebBackendCourse\TestLevel2::class,
        'config' => \app\Application::WEB_BACKEND_COURSE_CONFIG_PATH . 'level2.php'
    ],

    'web-backend-level3' => [
        'tester' => \app\Tests\WebBackendCourse\TestLevel3::class,
        'config' => \app\Application::WEB_BACKEND_COURSE_CONFIG_PATH . 'level3.php'
    ],

];
