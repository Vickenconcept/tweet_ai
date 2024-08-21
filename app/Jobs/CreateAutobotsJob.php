<?php

namespace App\Jobs;

use App\Services\AutobotService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CreateAutobotsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $autobotService;

    public function __construct()
    {
        $this->autobotService = new AutobotService();
    }

    public function handle()
    {

        try {
            Log::info('Starting to create Autobots.');
            $this->autobotService->createAutobots();
            Log::info('Autobots created successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to create Autobots: ' . $e->getMessage());
        }
      
    }
}
