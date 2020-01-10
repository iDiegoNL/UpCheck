<?php

namespace App\Http\Controllers;

use App\Monitor;
use App\Ping;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use App\Charts\MonitorLatency;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class MonitorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $monitors = User::findorFail(Auth::id())->monitors()->paginate(10);

        return view('monitors.index', ['monitors' => $monitors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('monitors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector|void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'domain' => 'required_without:ip|max:253',
            'ip' => 'required_without:domain|ipv4|max:255',
            'category' => 'required|max:16',
        ]);

        $monitor = Monitor::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'domain' => $request->domain,
            'monitor_type' => 1,
            'interval' => 5,
            'ip' => $request->ip,
            'category' => $request->category
        ]);

        return redirect(route('monitors.show', $monitor->id));
    }

    /**
     * Search for a resource.
     *
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Monitor $monitor
     * @return Response
     */
    public function show(Monitor $monitor)
    {
        // Get all response times from today
        $ms = Ping::where('monitor_id', $monitor->id)->whereDate('created_at', Carbon::today())->pluck('ms');
        // Create the labels for the ping graph
        // TODO: Figure out why the code below doesn't work, shows letters T and Z in timestamp.
        // TODO: $labels = Ping::where('monitor_id', $monitor->id)->pluck('created_at');
        // Temp fix: skip the model usage for now.
        $labels = DB::table('pings')->where('monitor_id', $monitor->id)->whereDate('created_at', Carbon::today())->pluck('created_at');
        // Get the date for the graph header
        // TODO: What the hell is going on here?
        $date = Carbon::parse(Ping::where('monitor_id', $monitor->id)->whereDate('created_at', Carbon::today())->latest()->value('created_at'))->toFormattedDateString();

        // Initialize the chart with the correct labels & datasets
        $chart = new MonitorLatency;
        $chart->labels($labels);
        $chart->dataset('Response times in ms', 'line', $ms);

        // Check if the monitor uses a Cloudflare IP and show an alert if it does
        // TODO: Save this data in the database and check for changes weekly
        // Get the IP list in plaintext from Cloudflare. They don't have an API for this yet
        // TODO: Use cURL
        $cloudflare_ip_list = file_get_contents('https://www.cloudflare.com/ips-v4');
        // Convert the text file to an array, using newline as a delimiter.
        $cloudflare_ip_list = explode("\n", $cloudflare_ip_list);

        if (in_array($monitor->ip, $cloudflare_ip_list)) {
            echo 'aaa';
        }

        // Return the view with the data
        return view('monitors.show', $monitor, compact('chart', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Monitor $monitor
     * @return Response
     */
    public function edit(Monitor $monitor)
    {
        return view('monitors.edit', $monitor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Monitor $monitor
     * @return Response
     */
    public function update(Request $request, Monitor $monitor)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'domain' => 'required_without:ip|max:253',
            'ip' => 'required_without:domain|ipv4|max:255',
            'category' => 'required|max:16',
        ]);

        $monitor = Monitor::find($monitor->id);

        $monitor->name = $request->name;
        $monitor->domain = $request->domain;
        $monitor->ip = $request->ip;
        $monitor->category = $request->category;

        $monitor->save();

        return redirect(route('monitors.show', $monitor->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Monitor $monitor
     * @return Response
     */
    public function indexAlerts(Monitor $monitor)
    {
        return view('monitors.alerts', $monitor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Monitor $monitor
     * @return Response
     */
    public function destroy(Monitor $monitor)
    {
        Ping::destroy(Ping::where('monitor_id', $monitor->id)->pluck('id'));
        Monitor::destroy($monitor->id);

        return back();
    }
}
