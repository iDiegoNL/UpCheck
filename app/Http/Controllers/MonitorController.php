<?php

namespace App\Http\Controllers;

use App\Monitor;
use App\Ping;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Charts\MonitorLatency;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitors = User::findorFail(Auth::id())->monitors()->paginate(10);

        return view('monitors.index', ['monitors' => $monitors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:16',
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function show(Monitor $monitor)
    {
        return view('monitors.show', $monitor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitor $monitor)
    {
        return view('monitors.edit', $monitor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monitor $monitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function indexAlerts(Monitor $monitor)
    {
        return view('monitors.alerts', $monitor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitor $monitor)
    {
        Ping::destroy(Ping::where('monitor_id', $monitor->id)->pluck('id'));
        Monitor::destroy($monitor->id);

        return back();
    }
}
