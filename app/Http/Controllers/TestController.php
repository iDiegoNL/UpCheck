<?php

namespace App\Http\Controllers;

use App\Jobs\PingMonitor;
use App\Notifications\MonitorOffline;
use App\Notifications\MonitorOnline;
use App\User;
use Illuminate\Http\Request;
use App\Ping;
use App\Monitor;
use App\Jobs\CheckPingTimes;
use Carbon\Carbon;
use JJG\Ping as JJGPing;
use Auth;

class TestController extends Controller
{
    public function forcePing()
    {
        if (Auth::check() && Auth::user()->name == 'Diego Relyveld') {
            $monitors = Monitor::all();

            foreach ($monitors as $monitor) {
                if (Ping::where('monitor_id', $monitor->id)->count() == 0) {
                    // PingMonitor::dispatch($monitor->id);
                    echo "<hr><b>New monitor, dispatch!</b>";
                } else {
                    $lastPing = Carbon::parse(Ping::where('monitor_id', $monitor->id)->latest()->value('created_at'));
                    $interval = Carbon::now()->subMinutes($monitor->interval);

                    echo "<hr><b>$monitor->id: </b> $lastPing<br><b>$interval</b><br>";

                    if ($lastPing->lessThan($interval)) {
                        echo "<b>More than $monitor->interval minutes ago, dispatch!</b>";
                        // PingMonitor::dispatch($monitor->id);
                    } else {
                        echo "<b>Minimum interval not reached, don't dispatch.</b>";
                    }
                }
            }
        } else {
            abort(404);
        }
    }

    public function test()
    {
        if (Auth::check() && Auth::user()->name == 'Diego Relyveld') {
            $now = Carbon::now();

            echo $now->timezone;
        } else {
            abort(404);
        }
    }
}
