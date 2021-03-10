<?php

namespace App\Console\Commands;

use App\Services\MyKafkaService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ToConsume extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'to:consume';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '去消费';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $consumer = MyKafkaService::consumer('TestTopicForDocker', 'test');
        $consumer->start(function ($topic, $part, $message) {
            Log::channel('kafka_server')->info($message);
            echo "我接收到了" . PHP_EOL;
        });
    }
}
