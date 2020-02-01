<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    use Searchable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'monitors';

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'monitors_index';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'monitor_type',
        'interval',
        'domain',
        'ip',
        'category',
        'status',
    ];

    /**
     * Get the user that owns the monitor.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the pings for the monitor.
     */
    public function pings()
    {
        return $this->hasMany('App\Ping');
    }
}
