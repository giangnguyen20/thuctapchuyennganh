<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    protected $table='info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tenkh', 'diachi', 'phonenumber', 'idteamview', 'password',
    ];

    public $timestamps = false;
}
