<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ping;
use App\Monitor;
use App\Jobs\CheckPingTimes;
use Carbon\Carbon;
use JJG\Ping as JJGPing;
use Auth;

class TestController extends Controller
{
    public function test()
    {
    }
}
