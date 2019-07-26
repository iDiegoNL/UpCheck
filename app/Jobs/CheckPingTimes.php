<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Ping;
use App\Monitor;
use App\Jobs\PingMonitor;

class CheckPingTimes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $monitors = Monitor::all();

        foreach ($monitors as $monitor) {
            $lastPing = Ping::where('monitor_id', $monitor->id)->orderBy('created_at')->first();

            $now = strtotime("-5 minutes");

            if (empty(Ping::where('monitor_id', $monitor->id)->orderBy('created_at')->first())) {
                PingMonitor::dispatch($monitor->id);
            } elseif ($now > strtotime($lastPing->created_at)) {
                PingMonitor::dispatch($monitor->id);
            }
        }
    }
}
