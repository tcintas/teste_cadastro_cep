<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
 
    protected $fillable = 
    [
    'product_name', 
    'item', 
    'amount', 
    'ini_year',
    'provider_name',
    'zipcode',
    'street',
    'district',
    'city',
    'state',
    'ibge'
    ];

    public $timestamps = true;
}
