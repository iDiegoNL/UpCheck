<?php

namespace App\Console\Commands;

use App\Jobs\PingMonitor;
use App\Monitor;
use App\Ping;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckPingTimes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ping:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $monitors = Monitor::all();

        foreach ($monitors as $monitor) {
            // If the monitor is new and has zero previous pings, dispatch the ping.
            if (Monitor::findOrFail($monitor->id)->pings->count() == 0) {
                return PingMonitor::dispatch($monitor->id);
            } else {
                // Get the most recent ping for the monitor.
                $lastPing = Ping::where('monitor_id', 1)->latest()->value('created_at');

                // $interval is the time now minus the interval in minutes.
                $interval = Carbon::now()->subMinutes($monitor->interval);

                // If the $lastPing is less than then $interval, dispatch it.
                if ($lastPing->lessThan($interval)) {
                    PingMonitor::dispatch($monitor->id);
                }
            }
        }
    }
}
