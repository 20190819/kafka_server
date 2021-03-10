<?php


namespace App\Services;

use Illuminate\Support\Arr;
use Kafka;
use Kafka\Consumer;
use Kafka\Producer;

class MyKafkaService
{
    public static function producer(string $topic, $value): Producer
    {
        $config = \Kafka\ProducerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(config('kafka.producer.refresh_interval_ms'));
        $config->setMetadataBrokerList(config('kafka.broker_list'));
        $config->setBrokerVersion(config('kafka.broker_version'));
        $config->setRequiredAck(config('kafka.producer.require_ack'));
        $config->setIsAsyn(false);
        $config->setProduceInterval(config('kafka.producer.producer_interval_ms'));
        return new \Kafka\Producer(function () use ($value, $topic) {
            return [
                [
                    'topic' => $topic,
                    'value' => $value,
                    'key' => '',
                ],
            ];
        });

    }

    public static function consumer(string $topic,string $group_id=''): Consumer
    {
        $config = \Kafka\ConsumerConfig::getInstance();
        $config->setMetadataRefreshIntervalMs(500);
        $config->setMetadataBrokerList(config('kafka.broker_list'));
        $config->setGroupId($group_id);
        $config->setBrokerVersion(config('kafka.broker_version'));
        $config->setTopics(Arr::wrap($topic));
        $config->setOffsetReset(config('kafka.consumer.set_offset_reset'));
        return new \Kafka\Consumer();
    }
}
