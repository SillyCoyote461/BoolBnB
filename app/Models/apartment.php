<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class apartment extends Model
{
    protected $fillable= [
        'title',
        'rooms',
        'beds',
        'baths',
        'meters',
        'address',
        'visibility',
        'description',
        'cover',
        'lat',
        'lon'
    ];


    public function sevices(){
        return $this->belongsToMany('App/Models/service');
    }
}
