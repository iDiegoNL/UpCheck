<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use JJG\Ping as JJGPing;
use App\Monitor;
use App\Ping;

/**
 * Class PingMonitor
 * @package App\Jobs
 */
class PingMonitor implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $monitor;

    /**
     * Create a new job instance.
     *
     * @param Monitor $monitor
     * @return void
     */
    public function __construct($monitor)
    {
        $this->monitor = $monitor;
    }

    /**
     * Execute the job.
     *
     * @param Monitor $monitor
     * @return void
     */
    public function handle()
    {
        $monitor = Monitor::find($this->monitor);
        // Define the host ($host is two variables, but one is NULL since you can't have an IP and domain)
        $host = $monitor->domain . $monitor->ip;
        // Define the port, maybe an option to customize it later??
        $port = 80;
        // Use JJG/Ping to ping the domain or IP, class is renamed to JJGPing in this function since we already have a model named Ping.
        $ping = new JJGPing($host);
        // I'm creating an empty array so we can push data in it later with array_push. This array will be used to store the three pings, and get the average ping.
        $array = [];
        // Set the timeout to 1s (1000ms).
        $ping->setTimeout(1);
        // If a port is defined above, set the port in the JJGPing class.
        if (isset($port)) {
            $ping->setPort($port);
        }
        // PHP loop thingy, loop it three times.
        $i = 0;
        while ($i < 3) {
            // Ping the host with the fsockopen method.
            $latency = $ping->ping("fsockopen");
            // Push the result ($latency) to the array
            array_push($array, $latency);
            // PHP loop thingy continues, we all know how it works..
            $i++;
        }
        // If the latency IS NOT false.
        if ($latency !== false) {
            // Add up the three pings, divide it by three (the amount of pings) and that's the average. Now round it.
            $average = round(array_sum($array) / count($array));
            // Send a notification that the monitor is back online (soonTM)
            if (Monitor::find($monitor->id)->value('status') == 'offline') {
            }
            // Store the ping in the database.
            Ping::create([
                'monitor_id' => $monitor->id,
                'user_id' => $monitor->user_id,
                'ms' => $average
            ]);
            // Set the status of the monitor to online
            Monitor::where('id', $monitor->id)
                ->update(['status' => 'online']);
        } else {
            // Set the monitor status to offline
            Monitor::where('id', $monitor->id)
                ->update(['status' => 'offline']);
            // Create a new row for this ping in our DB.
            Ping::create([
                'monitor_id' => $monitor->id,
                'user_id' => $monitor->user_id,
                'ms' => 0
            ]);
            // If the last ping was successful (online)
            if (Monitor::find($monitor->id)->value('status') == 'online') {
                // Send a notification that the monitor has gone offline (soonTM)
            }
        }
    }
}
