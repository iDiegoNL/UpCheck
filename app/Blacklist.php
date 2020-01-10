<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blacklist';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'name',
        'reason',
    ];
}
