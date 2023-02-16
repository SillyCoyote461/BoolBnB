<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = [
        'email',
        'message',
        'view',
        'name',
        'surname'
    ];

    /* public function messages(){
        return $this->belongsToMany('App\Models\apartment');
    } */
}
