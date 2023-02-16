<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sponsor extends Model
{
    protected $fillable = [
        'name',
        'price',
        'hours'
    ];

    public function sponsor(){
        return $this->belongsToMany('App\Models\apartment');
    }
}
