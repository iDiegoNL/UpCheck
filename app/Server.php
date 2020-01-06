<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'servers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'hostname',
        'distro',
        'uptime',
        'private_ip',
        'public_ip',
        'cpus',
        'cpu_load',
        'total_memory',
        'memory_in_use',
        'free_memory',
    ];

    /**
     * Get the user that owns the server.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
