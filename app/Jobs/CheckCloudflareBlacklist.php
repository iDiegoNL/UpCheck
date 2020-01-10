<?php

namespace App\Jobs;

use App\Blacklist;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckCloudflareBlacklist implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
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
        $old_ips = Blacklist::where('name', 'Cloudflare')->pluck('value')->toArray(); // Get all the old IPs (that are currently in DB)

        $new_ips = file_get_contents('https://www.cloudflare.com/ips-v4'); // Get the Cloudflare plaintext file
        $new_ips = explode("\n", $new_ips); // Convert the plaintext to an array, every new line is a new key
        $new_ips = array_filter(array_map('trim', $new_ips)); // Trim the whitespaces

        foreach ($new_ips as &$ip) {
            $ip = substr($ip, 0, strpos($ip, "/")); // Format the IPs correctly
        }

        // Check if there are any old IPs that Cloudflare doesn't use anymore, and remove them.
        $differences = array_diff($old_ips, $new_ips);

        // Delete the differences (old IPs)
        foreach ($differences as $difference) {
            Blacklist::where('value', $difference)->firstorFail()->delete();
        }

        // Add the new IPs into the DB if they aren't in there yet.
        foreach ($new_ips as $ip) {
            Blacklist::firstOrCreate([
                'value' => $ip,
                'name' => 'Cloudflare',
                'reason' => 'It looks like you are using Cloudflare.<br>Please use the origin IP of your server instead.<br>Otherwise, downtime might not be monitored correctly. '
            ]);
        }
    }
}
