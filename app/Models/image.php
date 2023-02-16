<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{

    protected $fillable = [
        'img',
        'cover',
        
    ];
    public function images(){
        return $this->belongsToMany('App\Models\apartment');
    }
}
