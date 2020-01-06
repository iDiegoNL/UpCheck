<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Validator;
use App\Server;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;
use Auth;

class ServerController extends Controller
{
    public function index()
    {
        $servers = User::findorFail(Auth::id())->servers()->paginate(10);

        return view('servers.index', compact('servers'));
    }

    public function request(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'api_key' => 'required|string|uuid'
            // User ID is temp, will be replaced with an API key
            'user_id' => 'required|numeric|min:1',
            'json' => 'required|json',
            'api_token' => 'required|string|min:60|max:60',
        ]);

        // Return a 400 response with the validator messages
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        // Validate the API Token
        if (User::where('api_token', '!=', $request->api_token)->exists()) {
            return response()->json('401: API Token is not valid', 401);
        }

        $data = json_decode($request->json, true);

        if (Server::where('public_ip', $data['PublicIP'])->where('user_id', $request->user_id)->first() == null) {
            // If the server IP and user ID combination does not exist in the database, create a new entry
            $server = new Server();
        } else {
            // Else, update the existing data
            $server = Server::where('public_ip', $data['PublicIP'])->where('user_id', $request->user_id)->first();
        }

        $server->user_id = $request->user_id;
        $server->hostname = $data['hostname'];
        $server->distro = $data['distro'];
        $server->uptime = $data['uptime'];
        $server->private_ip = $data['IPAddress'];
        $server->public_ip = $data['PublicIP'];
        $server->cpus = $data['NumberOfCPUs'];
        $server->cpu_load = $data['CPULoad'];
        $server->total_memory = $data['TotalMemoryMB'];
        $server->memory_in_use = $data['MemoryInUse'];
        $server->free_memory = $data['FreeMemory'];

        $server->save();

        return response()->json('success', 400);
    }
}
