<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'owner_id',
        'name',
        'address',
        'value',
        'mortgage',
        'image'
    ];

    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function tenancies()
    {
        return $this->hasMany('App\Tenancy');
    }
}
