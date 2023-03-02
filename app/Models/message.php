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
        'surname',

    ];

    public $timestamps = false;

    public function apartment(){
        return $this->belongsTo('App\Models\apartment');
    }
}
