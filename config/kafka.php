<?php

return [
    'broker_version' => env('BROKER_VERSION', '1.0.0'),
    'broker_list' => env('BROKER_LIST', ''),
    'producer' => [
        'refresh_interval_ms' => env('PRODUCER_REFRESH_INTERVAL_MS', 10000),
        'producer_interval_ms' => env('PRODUCER_INTERVAL_MS', 500),
        'require_ack' => env('REQUIRE_ACK', 1),
        'is_async' => env('IS_ASYNC', false),
    ],
    'consumer' => [
        'refresh_interval_ms' => env('CONSUMER_REFRESH_INTERVAL_MS', 500),
        'set_offset_reset' => env('CONSUMER_SET_OFFSET_RESET', 'earliest'),
    ]
];
