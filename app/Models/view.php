<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class view extends Model
{
    protected $fillable = [
        'ip_address',
    ];
    public $timestamps = false;

    public function views(){
        return $this->belongsTo('App\Models\apartment');
    }
}
