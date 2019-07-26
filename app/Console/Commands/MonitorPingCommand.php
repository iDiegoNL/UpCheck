<?php

namespace App\Console\Commands;

use App\Monitor;
use App\Ping;
use Artisan;
use Auth;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use JJG\Ping as JJGPing;
use App\Notifications\MonitorDown;
use App\User;

class MonitorPingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monitor:ping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ping all the monitors';


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
        // Define the progress bar (for in the console)
        $bar = $this->output->createProgressBar(count($monitors));
        $bar->setFormat(' %current%/%max% [%bar%] %percent:3s%% %elapsed:6s%/%estimated:-6s% %memory:6s%');
        $bar->setOverwrite(true);
        // Start the progress bar
        $bar->start();
        //Store the micro time so that we know when our script started to run.
        $executionStartTime = microtime(true);
        foreach ($monitors as $monitor) {
            $executionStartTime1 = microtime(true);
            // Define the host ($host equals two variables, but one is NULL since you can't have an IP and domain)
            $host = $monitor->domain . $monitor->ip;
            // Define the port, maybe an option to customize it later??
            $port = 80;
            // Use JJG/Ping to ping the domain or IP, class is renamed to JJGPing in this function since we already have an model named Ping.
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
                // Display the avg ping in the console
                $this->line('');
                $this->info('Average ping: ' . $average);
                if (Monitor::find($monitor->id)->value('status') == 'offline') {
                    // Send a notification that the monitor is back online (soonTM)
                }
                Ping::create([
                    'monitor_id' => $monitor->id,
                    'user_id' => $monitor->user_id,
                    'ms' => $average
                ]);
                // Set the status of the monitor to online
                $db_monitor = Monitor::find($monitor->id);
                $db_monitor->status = 'online';
                $db_monitor->save();
            } else {
                // Set the monitor status to offline
                $db_monitor = Monitor::find($monitor->id);
                $db_monitor->status = 'offline';
                $db_monitor->save();
                // Create a new row for this ping in our DB.
                Ping::create([
                    'monitor_id' => $monitor->id,
                    'user_id' => $monitor->user_id,
                    'ping' => 0
                ]);
                // If the last ping was successful (aka online)
                if (Monitor::find($monitor->id)->value('status') == 'online') {
                    $user = User::find(Auth::id());
                    $user->notify(new MonitorDown($monitor));
                }
                $user = User::find($monitor->user_id);
                $user->notify(new MonitorDown($monitor));
            }
            // End the first part of the progress bar.
            $executionEndTime1 = microtime(true);
            //The result will be in seconds and milliseconds.
            $seconds1 = $executionEndTime1 - $executionStartTime1;
            $this->line('');
            $this->info('Time: ' . $seconds1);
            $bar->advance();
        }
        $executionEndTime = microtime(true);
        //The result will be in seconds and milliseconds.
        $seconds = $executionEndTime - $executionStartTime;
        // End the progress bar, and tell the console that we're finished.
        $bar->finish();
        $this->line('');
        $this->info('Total Execution Time: ' . $seconds);
    }
}
