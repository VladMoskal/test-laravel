<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenancy extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'property_id',
        'start_date',
        'end_date',
        'monthly_rent'
    ];

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function tenants()
    {
        return $this->hasMany('App\Tenant');
    }
}
