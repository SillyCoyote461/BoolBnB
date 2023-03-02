<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class apartment extends Model
{
    public $table = 'apartments';
    protected $fillable= [
        'name',
        'price',
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


    public function services(){
        return $this->belongsToMany('App\Models\service');
    }

    public function sponsors(){
        return $this->belongsToMany('App\Models\sponsor');
    }

    public function users(){
        return $this->belongsTo('App\user');
    }

    public function views(){
        return $this->belongsToMany('App\Models\view');
    }

    public function messages(){
        return $this->hasMany('App\Models\message');
    }

}
