<?php

require_once 'settings.php';

$REDIS_BACKEND = getenv('REDIS_BACKEND');
if(!empty($REDIS_BACKEND)) {
    Resque::setBackend($REDIS_BACKEND);
}

$numTask = 10;

for ($i = 0; $i < $numTask; $i++) {
    $id = Resque::enqueue('test', Jobs\FibonacciJob::class, [
        'n' => 38
    ], true);

    echo 'Queued job ' . $id . PHP_EOL;
}