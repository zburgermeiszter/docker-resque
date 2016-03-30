<?php

require 'vendor/autoload.php';

$settings = [
    'REDIS_BACKEND'     => 'redis:6379',    // Set Redis Backend Info
    'REDIS_BACKEND_DB'  => '0',                 // Use Redis DB 0
    'COUNT'             => '1',                 // Run 1 worker
    'INTERVAL'          => '5',                 // Run every 5 seconds
    'QUEUE'             => '*',                 // Look in all queues
    'PREFIX'            => 'test',              // Prefix queues with test
];

foreach ($settings as $key => $value) {
    putenv(sprintf('%s=%s', $key, $value));
}