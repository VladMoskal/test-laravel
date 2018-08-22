<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'tenancy_id',
        'name',
        'address',
        'image'
    ];

    public function tenancy()
    {
        return $this->belongsTo('App\Tenancy');
    }
}
