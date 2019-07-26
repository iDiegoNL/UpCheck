<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ping extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'monitor_id',
        'user_id',
        'ms',
    ];
}
