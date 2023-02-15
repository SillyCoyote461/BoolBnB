<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    protected $fillable = [
        'name'
    ];

    public function apartments(){
        return $this->belongsToMany('App\Models\apartment');
    }
}
