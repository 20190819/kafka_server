<?php

namespace App\Console\Commands;

use App\Services\MyKafkaService;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ToProduce extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'to:produce';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '去生产';

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
        $topic ='TestTopicForDocker';
        $value = Str::random();
        $producer = MyKafkaService::producer($topic, $value);
        $producer->error(function ($errorCode) {
            dd("errorCode: ".$this->error($errorCode));
        });
        $producer->send();
    }
}
