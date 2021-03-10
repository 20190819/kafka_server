<?php

return [
    'broker_version' => '',
    'broker_list' => '',
    'producer' => [
        'refresh_interval_ms' => 10000,
        'producer_interval_ms' => 500,
        'require_ack' => 1,
        'is_async' => false,
    ],
    'consumer' => [
        'refresh_interval_ms' => 500,
        'set_offset_reset' => 'earliest',
    ]
];
