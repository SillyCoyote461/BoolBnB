<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class view extends Model
{
    protected $fillable = [
        'date',
        'ip_address',
    ];
    public function views(){
        return $this->belongsTo('App\Models\apartment');
    }
}
